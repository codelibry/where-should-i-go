<?php 
/*
Template Name: Personal Paris
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
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
?>
<section class="contentBlock">
    <div class="container">
        <?php if($title): ?>
            <h5 class="contentBlock__title animate fade-up"><?php echo $title; ?></h5>
        <?php endif; ?>
        <?php if($text || $image): ?>
            <div class="contentBlock__textWrapper row">
                <?php if($text): ?>
                    <div class="contentBlock__text  p3 col-lg-7 col-12 animate fade-right delay-1"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php if($image): ?>
                    <div class="contentBlock__image col-lg-4 col-12"><div class="animate fade-left delay-2 parallax-img-wrapper"><img src="<?php echo $image['url']; ?>" class="parallax-img" alt="<?php echo $image['title']; ?>"></div></div>
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
        <?php if(have_rows('features')): ?>
            <div class="features__cards row">
                <?php $i = 1; while(have_rows('features')): the_row(); ?>
                    <?php 
                        $text = get_sub_field('text');
                    ?>
                    <div class="features__cardsItem col-lg-4 col-md-6 col-12 animate fade-up delay-<?php echo $i; ?>">
                        <h2 class="features__cardsItem__number">{ <?php echo $i; ?> }</h2>
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
<?php $text = get_field('text_block'); ?>
<?php if($text): ?>
<section class="textBlock">
    <div class="container">
        <div class="textBlock__content animate fade-up">
            <?php echo $text; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$image = get_field('cta_image');
$title = get_field('cta_title');
$text = get_field('cta_text');
$link = get_field('cta_button');
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
<?php if(have_rows('teaser_blocks')): ?>
<section class="teaser">
    <div class="container">
        <?php $i = 1; while(have_rows('teaser_blocks')): the_row(); ?>
            <?php 
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $link = get_sub_field('link');
            $image = get_sub_field('image');
            $link_label = get_sub_field('link_label');
            $link_type = get_sub_field('link_type');
            $download_file = get_sub_field('download_file');
            if($i % 2 == 0){
                $textAnimation = 'left';
                $imageAnimation = 'right';
            }
            else{
                $textAnimation = 'right';
                $imageAnimation = 'left';
            }
            ?>
            <div class="teaser__content row">
                <?php if($title || $text || $link): ?>
                    <div class="teaser__textWrapper animate fade-<?php echo $textAnimation; ?>">
                        <?php if($title): ?>
                            <h2 class="teaser__title"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if($text): ?>
                            <div class="teaser__text p3"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php if($link_type == 'Link'): ?>
                            <div class="teaser__button">
                                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                            </div>
                        <?php else: ?>
                            <?php if($link_label && $download_file): ?>
                                <div class="teaser__button">
                                    <a href="<?php echo $download_file['url']; ?>" download><?php echo $link_label; ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if($image): ?>
                    <div class="teaser__image"><div class="animate parallax-img-wrapper fade-<?php echo $imageAnimation; ?> delay-1"><img src="<?php echo $image['url'] ?>" class="parallax-img" alt="<?php echo $image['title']; ?>"></div></div>
                <?php endif; ?>
            </div>
        <?php $i++; endwhile; ?>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>