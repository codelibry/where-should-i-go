<?php

/**
 * Basic page template
 */

get_header();

$title = get_the_title();
$text = get_field('hero_text');
$content = get_the_content();

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


<?php if($content): ?>

    <section class="termsText">
        <div class="container">
            <div class="termsText__content content-block">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>