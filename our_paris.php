<?php 
/*
Template Name: Our Paris
*/
get_header();
?>
<?php 
$title = get_field('hero_title');
$text = get_field('hero_text');
if($title || $text):
?>
<section class="hero">
    <div class="container">
        <div class="hero__content">
            <?php if($title): ?>
                <h1 class="hero__title animate fade-up"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if($text): ?>
                <div class="hero__text animate fade-up delay-1"><?php echo $text; ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
?>
<section class="favoritiesBlock">
    <div class="container">
        <div class="favoritiesBlock__list">
            <?php $i = 1; while($the_query->have_posts()): $the_query->the_post(); ?>
            <?php 
            $price = get_field('price');
            $button = get_field('button_label'); 
            $email_text = get_field('email_text'); 
            $file = get_field('file');
            $delay = '';
            if($i % 2 == 0){
                $delay = ' delay-2';
            }
            ?>
            <?php if($i % 2 != 0): ?>
                <div class="favoritiesBlock__row">
            <?php endif; ?>
            <div class="favoritiesBlock__listItem product animate fade-up<?php echo $delay; ?>" data-email-text="<?php if($email_text): echo $email_text; endif; ?>" data-file="<?php if($file): echo $file; endif; ?>" data-text="<?php the_content(); ?>">
                <div class="favoritiesBlock__listItem__head">
                    <div class="favoritiesBlock__listItem__sideContent">
                        <div class="favoritiesBlock__listItem__content h4">
                            <h4 class="favoritiesBlock__listItem__title product-title"><?php the_title(); ?></h4>
                            <?php if($price == '0'): ?>
                                <div class="favoritiesBlock__listItem__price product-price"><span>Free</span></div>
                            <?php else: ?>
                                <div class="favoritiesBlock__listItem__price product-price"><span><?php echo $price; ?></span>€</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="favoritiesBlock__listItem__image product-image">
                        <div class="parallax-img-wrapper">
                            <img src="<?php if(!empty(get_the_post_thumbnail_url( ))){ echo get_the_post_thumbnail_url(); }else{ echo get_template_directory_uri(  ) . '/assets/images/placeholder.png'; } ?>" alt="" class="parallax-img">
                        </div>
                    </div>
                </div>
                <div class="favoritiesBlock__listItem__body">
                    <div class="favoritiesBlock__listItem__textWrapper">
                        <?php if(!empty(get_the_excerpt())): ?>
                            <div class="favoritiesBlock__listItem__text"><?php the_excerpt(); ?></div>
                        <?php endif; ?>
                        <?php if($button): ?>
                            <div class="favoritiesBlock__listItem__button show-product-popup"><?php echo $button; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($i % 2 == 0): ?>
                </div>
            <?php endif; ?>
            <?php $i++; endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$image = get_field('image');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
?>
<section class="parisContent">
    <div class="container">
        <div class="parisContent__wrapper">
            <?php if($image): ?>
                <div class="parisContent__image">
                    <div class="animate fade-right parallax-img-wrapper"><img src="<?php echo $image['url']; ?>" class="parallax-img" alt="<?php echo $image['title']; ?>"></div>
                </div>
            <?php endif; ?>
            <?php if($title || $text || $button): ?>
                <div class="parisContent__textWrapper animate fade-left delay-2">
                    <?php if($title): ?>
                        <h2 class="parisContent__title"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <div class="parisContent__text"><?php echo $text; ?></div>
                    <?php endif; ?>
                    <?php if($button): ?>
                        <div class="parisContent__button button"><a href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<div class="orderPopup">
    <div class="orderPopup__content">
        <div class="orderPopup__productWrapper">
            <div class="orderPopup__product">
                <h4 class="orderPopup__productContent">
                    <div class="orderPopup__productTitle"></div>
                    <div class="orderPopup__productPrice"></div>
                </h4>
                <div class="orderPopup__productImage"><img src="" alt=""></div>
            </div>
        </div>
        <div class="orderPopup__textWrapper">
            <div class="orderPopup__text">
            </div>
            <div class="orderPopup__form">
                <?php echo do_shortcode( '[ninja_form id=2]' ); ?>
            </div>
        </div>
    </div>
    <div class="orderPopup__close"></div>
</div>
<?php get_footer(); ?>