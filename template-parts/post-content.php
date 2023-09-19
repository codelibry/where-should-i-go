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
            <div class="hero__content col-lg-8<?php if($img){echo ' has-image';} ?>">
                <?php if($title): ?>
                    <h2 class="hero__title sm"><?php echo $title; ?></h2>
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
<?php
    $pagelist = get_posts('sort_column=menu_order&sort_order=asc');
    $pages = array();
    foreach ($pagelist as $page) {
        $pages[] += $page->ID;
    }

    $current = array_search(get_the_ID(), $pages);
    $prevID = $pages[$current - 1];
    $nextID = $pages[$current + 1];
?>

<section class="arrows">
    <div class="container">
        <div class="arrows__content">
            
            <?php if (!empty($prevID)) { ?>
                <a class="arrows__leftSide" href="<?php echo get_permalink($prevID); ?>">
                    <div class="arrows__leftSide__icon"><img src="<?php echo get_template_directory_uri(  ) . '/assets/images/next.png' ?>" alt=""></div>
                    <div class="arrows__leftSide__text">
                        <div class="arrows__leftSide__direction">Previous Article</div>
                        <h5 class="arrows__leftSide__post"><?php echo get_the_title($prevID); ?></h5>
                    </div>
                </a>
            <?php }
            if (!empty($nextID)) { ?>
                <a class="arrows__rightSide" href="<?php echo get_permalink($nextID); ?>">
                    <div class="arrows__rightSide__text">
                        <div class="arrows__rightSide__direction">Next Article</div>
                        <h5 class="arrows__rightSide__post"><?php echo get_the_title($nextID); ?></h5>
                    </div>
                    <div class="arrows__rightSide__icon"><img src="<?php echo get_template_directory_uri(  ) . '/assets/images/next.png' ?>" alt=""></div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>