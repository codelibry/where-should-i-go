<?php get_header(); ?>
<?php 
$image = get_field('hero_image');
$title = get_field('hero_title');
$text = get_field('hero_text');
$link = get_field('hero_link');
$mobile_link = get_field('hero_mobile_link');
?>
<section class="fpHero">
    <div class="container">
        <div class="fpHero__contentWrapper row">
            <?php if($image): ?>
                <div class="fpHero__image col-md-4 col-12"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
            <?php endif; ?>
            <?php if($title || $text || $link): ?>
                <div class="fpHero__content col-md-8 col-12">
                    <?php if($title): ?>
                        <h1 class="fpHero__title"><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <div class="fpHero__text"><?php echo $text; ?></div>
                    <?php endif; ?>
                    <?php if($link): ?>
                        <div class="fpHero__link button"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
                    <?php endif; ?>
                    <?php if($mobile_link): ?>
                        <div class="fpHero__mobileLink button"><a href="<?php echo $mobile_link['url']; ?>"><?php echo $mobile_link['title']; ?></a></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$title = get_field('favorities_slider_title');
$text = get_field('favorities_slider_text');
$link = get_field('favorities_slider_link');
$slider = get_field('favorities_slider');
?>
<section class="favorities">
    <div class="container">
        <?php if($title || $text || $link): ?>
            <div class="favorities__content">
                <?php if($title): ?>
                    <h2 class="favorities__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="favorities__text"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php if($link): ?>
                    <div class="favorities__link button"><a href="<?php echo $link['url'] ?>"><?php echo $link['title']; ?></a></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($slider): ?>
            <div class="favorities__slider">
                <?php foreach($slider as $post): setup_postdata( $post ); ?>
                    <?php 
                    $id = get_the_ID();
                    $product = wc_get_product( $id );
                    $price = $product->get_price();
                    ?>
                    <?php $button = get_field('button_label'); ?>
                    <div class="favorities__sliderItem product product-text" data-text="<?php the_content(); ?>" data-id="<?php echo get_the_ID(); ?>" data-slug="<?php echo $post->post_name; ?>">
                        <div class="favorities__sliderItem__head">
                            <div class="favorities__sliderItem__contentWrapper">
                                <div class="favorities__sliderItem__content h4">
                                    <h4 class="favorities__sliderItem__title product-title"><?php the_title(); ?></h4>
                                    <div class="favorities__sliderItem__price product-price"><?php echo $product->get_regular_price() . '€'; ?></div>
                                </div>
                            </div>
                            <div class="favorities__sliderItem__image product-image">
                                <img src="<?php if(!empty(get_the_post_thumbnail_url( ))){ echo get_the_post_thumbnail_url(); }else{ echo get_template_directory_uri(  ) . '/assets/images/placeholder.png'; } ?>" alt="">
                                <?php if(!empty(get_the_excerpt(  ))): ?>
                                    <div class="favorities__sliderItem__text"><?php the_excerpt(  ); ?></div>
                                <?php endif; ?>
                                <?php if($button): ?>
                                    <div class="favorities__sliderItem__button show-product-popup"><?php echo $button; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="favorities__sliderItem__body">
                            <?php if(!empty(get_the_excerpt(  ))): ?>
                                <div class="favorities__sliderItem__text"><?php the_excerpt(  ); ?></div>
                            <?php endif; ?>
                            <?php if($button): ?>
                                <div class="favorities__sliderItem__button show-product-popup"><?php echo $button; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(  ); ?>
            </div>
        <?php endif; ?>
        <div class="favorities__bottom">
            <div class="favorities__arrows">
                <div class="favorities__arrow favorities__leftArrow"></div>
                <div class="favorities__arrow favorities__rightArrow"></div>
            </div>
        </div>
    </div>
</section>
<?php 
$title = get_field('description_title');
$text = get_field('description_text');
$image = get_field('description_image');
?>
<section class="description">
    <div class="container">
        <?php if($title): ?>
            <h4 class="description__title"><?php echo $title; ?></h4>
        <?php endif; ?>
        <?php if($text || $image): ?>
            <div class="description__content row">
                <?php if($text): ?>
                    <div class="description__text col-lg-7 col-12">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
                <?php if($image): ?>
                    <div class="description__image col-lg-5 col-12">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php 
$title = get_field('features_title');
?>
<section class="features">
    <div class="container">
        <?php if($title): ?>
            <h2 class="features__title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if(have_rows('features_list')): ?>
            <div class="features__cards row">
                <?php $i = 1; while(have_rows('features_list')): the_row(); ?>
                    <?php 
                        $title = get_sub_field('title'); 
                        $text = get_sub_field('text');
                    ?>
                    <div class="features__cardsItem col-lg-4 col-md-6 col-12">
                        <h2 class="features__cardsItem__number">{ <?php echo $i; ?> }</h2>
                        <?php if($title): ?>
                            <h4 class="features__cardsItem__title"><?php echo $title; ?></h4>
                        <?php endif; ?>
                        <?php if($text): ?>
                            <div class="features__cardsItem__text">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $i++; endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php 
$image = get_field('cta_image');
$title = get_field('cta_title');
$text = get_field('cta_text');
$link = get_field('cta_link');
?>
<section class="cta" id="cta">
    <div class="container">
        <div class="cta__contentWrapper">
            <?php if($image): ?>
                <div class="cta__image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
            <?php endif; ?>
            <div class="cta__content">
                <?php if($title): ?>
                    <h2 class="cta__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="cta__text"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php if($link): ?>
                    <div class="cta__button"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
if(have_rows('testimonials__list')):
?>
<section class="testimonial">
    <div class="container">
        <div class="testimonials__list">
            <?php while(have_rows('testimonials__list')): the_row(); ?>
                <?php 
                $text = get_sub_field('text');
                $author = get_sub_field('testimonial_author');
                ?>
                <div class="testimonial__item">
                    <div class="testimonial__content">
                        <?php if($text): ?>
                            <h4 class="testimonial__text">
                                <?php echo $text; ?>
                            </h4>
                        <?php endif; ?>
                        <?php if($author): ?>
                            <div class="testimonial__author">
                                — <?php echo $author; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$title = get_field('images_slider_title');
$image_slider = get_field('image_slider_shortcode');
if($image_slider):
?>
<section class="imagesSlider">
    <div class="container">
        <?php if($title): ?>
            <h2 class="imagesSlider__title">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>
        <?php echo $image_slider; ?>
        <div class="imagesSlider__bottom">
            <div class="imagesSlider__arrows">
                <div class="imagesSlider__arrow imagesSlider__arrowBefore"></div>
                <div class="imagesSlider__arrow imagesSlider__arrowAfter"></div>
            </div>
            <h2 class="imagesSlider__numbers">
                <span class="imagesSlider__currentSlide">1</span> / <span class="imagesSlider__lastSlide"></span>
            </h2>
        </div>
    </div>
</section>
<?php endif; ?>
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