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
                <h1 class="hero__title"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if($text): ?>
                <div class="hero__text"><?php echo $text; ?></div>
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
            <?php while($the_query->have_posts()): $the_query->the_post(); ?>
            <?php $price = get_field('price'); ?>
            <?php $button = get_field('button_label'); ?>
            <div class="favoritiesBlock__listItem product" data-text="<?php the_content(); ?>">
                <div class="favoritiesBlock__listItem__head">
                    <div class="favoritiesBlock__listItem__sideContent">
                        <div class="favoritiesBlock__listItem__content h4">
                            <h4 class="favoritiesBlock__listItem__title product-title"><?php the_title(); ?></h4>
                            <?php if($price): ?>
                                <div class="favoritiesBlock__listItem__price product-price"><?php echo $price; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="favoritiesBlock__listItem__image product-image">
                        <img src="<?php if(!empty(get_the_post_thumbnail_url( ))){ echo get_the_post_thumbnail_url(); }else{ echo get_template_directory_uri(  ) . '/assets/images/placeholder.png'; } ?>" alt="">
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
            <?php endwhile; wp_reset_postdata(); ?>
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
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                </div>
            <?php endif; ?>
            <?php if($title || $text || $button): ?>
                <div class="parisContent__textWrapper">
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
                <?php echo do_shortcode('[contact-form-7 id="a001442" title="Order product form"]'); ?>
            </div>
        </div>
    </div>
    <div class="orderPopup__close"></div>
</div>
<?php get_footer(); ?>