<?php
// Configurações do servidor de email
define('MAIL_HOST', 'smtp.gmail.com'); // Servidor SMTP
define('MAIL_PORT', 587); // Porta SMTP
define('MAIL_USERNAME', 'suportcedup151@gmail.com');
define('MAIL_PASSWORD', 'suport151');
define('MAIL_FROM', 'suportcedup151@gmail.com');
define('MAIL_FROM_NAME', 'Cedup Suporte');

// Função para enviar email
function sendEmail($to, $subject, $message) {
    // Verificar se o autoload.php existe
    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        error_log("Erro: autoload.php não encontrado");
        return false;
    }
    
    require_once __DIR__ . '/../vendor/autoload.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = MAIL_PORT;
        $mail->CharSet = 'UTF-8';
        
        // Configurações adicionais de segurança
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        // Habilitar debug
        $mail->SMTPDebug = 2; // 2 = mensagens de cliente e servidor
        $mail->Debugoutput = function($str, $level) {
            error_log("PHPMailer Debug: $str");
        };

        // Remetente e destinatário
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        $mail->addAddress($to);

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Tentar enviar o email
        if (!$mail->send()) {
            error_log("Erro ao enviar email: " . $mail->ErrorInfo);
            return false;
        }
        
        return true;
    } catch (Exception $e) {
        error_log("Exceção ao enviar email: " . $e->getMessage());
        return false;
    }
} 