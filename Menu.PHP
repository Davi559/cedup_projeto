<?php
$menuItems = [
    'adms' => 'LoginADM.php',
    'home' => 'index.php'
];
?>
<div class="menu-vertical" id="menuVertical">
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <nav class="menu-content">
        <ul>
            <?php foreach ($menuItems as $item => $link): ?>
                <li><a href="<?php echo $link; ?>"><?php echo $item; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
