<?php

/**
 * Template to show post content of single post template
 */

$title = get_the_title();
$text = get_field('hero_text');
$img = get_the_post_thumbnail();
$content = get_the_content();

?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="hero__content col-lg-8<?php if($img){echo ' has-image';} ?>">
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
                <div class="col-lg-4 hero__img-column">
                    <div class="hero__img-wrapper">
                        <?php echo $img; ?>
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
                <?php echo $content; ?>
            </div>
        </div>
    </section>

<?php endif; ?>