<?php

/**
 * Template to show post content of single post template
 */

$title = get_the_title();
$text = get_field('hero_text');
$img = get_field('hero_image');
$content = get_the_content();

?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="hero__content col-lg-7<?php if($img){echo ' has-image';} ?>">
                <?php if($title): ?>
                    <h2 class="hero__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($text): ?>
                    <div class="hero__text"><?php echo $text; ?></div>
                <?php endif; ?>
                <div class="hero__date">
                    <?php echo get_the_date('F j, Y'); ?>
                </div>
            </div>
            <?php if ($img) : ?>
                <div class="col-lg-5 hero__img-column">
                    <div class="hero__img-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>">
                    </div>
                </div>
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