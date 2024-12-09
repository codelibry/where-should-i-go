<?php 
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<?php 
$title = get_field('hero_title');
$text = get_field('hero_text');
if($title || $text):
?>
<section class="hero">
    <div class="container">
        <div class="hero__content">
            <?php if($title): ?>
                <h1 class="hero__title sm animate fade-up"><?php echo $title; ?></h1>
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
<section class="about">
    <div class="container">
        <div class="about__content">
            <div class="about__textWrapper animate fade-right">
                <?php if($title): ?>
                    <h2 class="about__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="about__text p3"><?php echo $text; ?></div>
                <?php endif; ?>
            </div>
            <?php if($image): ?>
                <div class="about__image"><div class="animate fade-left parallax-img-wrapper delay-1"><img src="<?php echo $image['url']; ?>" class="" alt="<?php echo $image['title']; ?>"></div></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$title = get_field('accordion_block_title');
if(have_rows('accordion_lines')):
?>
<section class="accordion">
    <div class="container">
        <?php if($title): ?>
            <h3 class="accordion__title animate fade-up"><?php echo $title; ?></h3>
        <?php endif; ?>
        <div class="accordion__list">
            <?php while(have_rows('accordion_lines')): the_row(); ?>
                <?php 
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                if($title || $content):
                ?>
                    <div class="accordion__listItem<?php if($content){echo ' has-content';} ?> animate fade-up">
                        <?php if($title): ?>
                            <h5 class="accordion__listItem__title"><?php echo $title; ?></h5>
                        <?php endif; ?>
                        <?php if($content): ?>
                            <div class="accordion__listItem__content"><?php echo $content; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$text = get_field('text_block');
if($text):
?>
<section class="about__textBlock">
    <div class="container">
        <div class="about__textBlock__content animate fade-up">
            <?php echo $text; ?>
        </div>
    </div>
</section>
<?php endif; ?>
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
                    <div class="teaser__image"><div class="animate parallax-img-wrapper fade-<?php echo $imageAnimation; ?> delay-1"><img src="<?php echo $image['url'] ?>" class="" alt="<?php echo $image['title']; ?>"></div></div>
                <?php endif; ?>
            </div>
        <?php $i++; endwhile; ?>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>