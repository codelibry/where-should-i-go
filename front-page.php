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
                <div class="fpHero__image col-md-4 col-12 "><div class="animate fade-right parallax-img-wrapper"><img src="<?php echo $image['url']; ?>" class="parallax-img" alt="<?php echo $image['title']; ?>"><img src="<?php echo $image['url']; ?>" class="hidden-img" alt="<?php echo $image['title']; ?>"></div></div>
            <?php endif; ?>
            <?php if($title || $text || $link): ?>
                <div class="fpHero__content col-md-8 col-12 animate fade-left delay-1">
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
                    <h2 class="favorities__title animate fade-up"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="favorities__text animate fade-up delay-1"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php if($link): ?>
                    <div class="favorities__link button animate fade-up delay-2"><a href="<?php echo $link['url'] ?>"><?php echo $link['title']; ?></a></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if($slider): ?>
        <div class="favorities__slider animate fade-up delay-3" slide-index="1">
            <?php foreach($slider as $post): setup_postdata( $post ); ?>
                <?php 
                $price = get_field('price'); 
                $button = get_field('button_label'); 
                $slug = $post->post_name;
                ?>
                <div class="favorities__sliderItem product product-text" data-slug="<?php echo $slug; ?>" data-open-popup="true" data-text="<?php the_content(); ?>">
                    <div class="favorities__sliderItem__head">
                        <div class="favorities__sliderItem__contentWrapper">
                            <div class="favorities__sliderItem__content h4">
                                <h4 class="favorities__sliderItem__title product-title"><?php the_title(); ?></h4>
                                <?php if($price == '0'): ?>
                                    <div class="favorities__sliderItem__price product-price"><span>Free</span></div>
                                <?php else: ?>
                                    <div class="favorities__sliderItem__price product-price"><span><?php echo $price; ?></span>€</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="favorities__sliderItem__image product-image">
                            <div class="parallax-img-wrapper">
                                <img src="<?php if(!empty(get_the_post_thumbnail_url( ))){ echo get_the_post_thumbnail_url(); }else{ echo get_template_directory_uri(  ) . '/assets/images/placeholder.png'; } ?>" alt="" class="parallax-img">
                            </div>
                            
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
</section>
<?php 
$title = get_field('description_title');
$text = get_field('description_text');
$image = get_field('description_image');
?>
<section class="description">
    <div class="container">
        <?php if($title): ?>
            <h4 class="description__title animate fade-up"><?php echo $title; ?></h4>
        <?php endif; ?>
        <?php if($text || $image): ?>
            <div class="description__content row">
                <?php if($text): ?>
                    <div class="description__text col-lg-7 col-12 animate fade-right delay-1">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
                <?php if($image): ?>
                    <div class="description__image col-lg-5 col-12">
                        <div class="animate fade-left delay-2 parallax-img-wrapper"><img src="<?php echo $image['url']; ?>" class="parallax-img" alt="<?php echo $image['title']; ?>"></div>
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
            <h2 class="features__title animate fade-up"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if(have_rows('features_list')): ?>
            <div class="features__cards row">
                <?php $i = 1; while(have_rows('features_list')): the_row(); ?>
                    <?php 
                        $title = get_sub_field('title'); 
                        $text = get_sub_field('text');
                    ?>
                    <div class="features__cardsItem col-lg-4 col-md-6 col-12 animate fade-up delay-<?php echo $i; ?>">
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
                <div class="cta__image animate fade-right"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
            <?php endif; ?>
            <div class="cta__content animate fade-left delay-1">
                <?php if($title): ?>
                    <h2 class="cta__title animate fade-up delay-2"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="cta__text animate fade-up delay-3"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php if($link): ?>
                    <div class="cta__button animate fade-up delay-4"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
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
        <div class="testimonials__list animate fade-up">
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
            <h2 class="imagesSlider__title animate fade-right">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?> 
        <div class="imagesSlider__wrapper animate fade-left delay-1">
            <?php echo $image_slider; ?>
        </div>
        <div class="imagesSlider__bottom animate fade-left delay-1">
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
<?php 
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
?>
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
            <?php while($the_query->have_posts()): $the_query->the_post(); ?>
                <?php 
                $payment_form = get_field('payment_form');
                $post = get_post(get_the_ID()); 
                $slug = $post->post_name;
                if($payment_form):
                ?>
                <div class="orderPopup__form <?php echo $slug; ?>">
                    <?php echo do_shortcode($payment_form); ?>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="orderPopup__close"></div>
</div>
<?php $submit_popup_text = get_field('submit_popup_text', 'options'); ?>

<div class="orderSubmit__wrapper">
    <div class="orderSubmit__content">
        <a href="<?php echo get_home_url(); ?>" class="orderSubmit__close"></a>
        <div class="orderSubmit__text"><?php echo $submit_popup_text; ?></div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>

