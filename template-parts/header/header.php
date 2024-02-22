<?php 
$logo = get_field('header_logo', 'options');
$button = get_field('header_menu_cta_button', 'options');
?>
<header class="header">
	<div class="container">
        <div class="header__content">
            <?php if($logo): ?>
                <div class="header__logo">
                    <a href="<?php echo get_home_url() ?>">
                        <?php if(is_front_page()): ?>
                            <h1>
                                <span class="top_line">Where</span>
                                <span class="bottom_line"> should <span class="logo-i-letter">I</span> go<span class="logo-quest-letter">?</span></span>
                            </h1>
                        <?php else: ?>
                            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['title']; ?>">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="header__menuWrapper">
                <div class="header__menu">
                    <?php wp_nav_menu(array('menu' => 'main-menu',)) ?>
                    <?php if($button): ?>
                        <a href="<?php echo $button['url']; ?>" class="header__button"><?php echo $button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header__lang"></div>
            <?php if($button): ?>
                <a href="<?php echo $button['url']; ?>" class="header__button tablet"><?php echo $button['title']; ?></a>
            <?php endif; ?>
            <div class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
