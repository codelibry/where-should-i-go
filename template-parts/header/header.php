<?php 
$logo = get_field('header_logo', 'options');
?>
<header class="header">
	<div class="container">
        <div class="header__content">
            <?php if($logo): ?>
                <div class="header__logo">
                    <a href="<?php echo get_home_url() ?>"><img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['title']; ?>"></a>
                </div>
            <?php endif; ?>
            <div class="header__menu">
                <?php wp_nav_menu(array('menu' => 'main-menu',)) ?>
            </div>
            <div class="header__lang"></div>
            <div class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
