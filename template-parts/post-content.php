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
    // $pagelist = get_posts('sort_column=menu_order&sort_order=asc');
    // $pages = array();
    // foreach ($pagelist as $page) {
    //     $pages[] += $page->ID;
    // }
    // $current = array_search(get_the_ID(), $pages) - 1;
    // $prevID = $pages[$current - 1];
    // $nextID = $pages[$current + 1];
?>

<section class="arrows">
    <div class="container">
        <div class="arrows__content">
            <?php if(get_previous_post_link()): ?>
                <div class="arrows__leftSide">
                    <?php previous_post_link('%link', '<div class="arrows__leftSide__icon"><img src="' . get_template_directory_uri(  ) . '/assets/images/next.png" alt=""></div><div class="arrows__leftSide__text"><div class="arrows__leftSide__direction">Previous Article</div><h5 class="arrows__leftSide__post">%title</h5></div>'); ?>
                </div>
            <?php endif; ?>
            <?php if(get_next_post_link()): ?>
                <div class="arrows__rightSide">
                    <?php next_post_link('%link', '<div class="arrows__rightSide__text"><div class="arrows__rightSide__direction">Next Article</div><h5 class="arrows__rightSide__post">%title</h5></div><div class="arrows__rightSide__icon"><img src="' . get_template_directory_uri(  ) . '/assets/images/next.png" alt=""></div>') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$post_id = get_the_ID();
$cat_names = get_the_category($post_id);
$cats = array();
foreach($cat_names as $cat_name):
    array_push($cats, $cat_name->slug);
endforeach;
$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $cats,
        ),
    ),
    'post__not_in'      => [get_the_ID()]
);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
?>
<section class="similarPosts">
    <div class="container">
        <div class="similarPosts__content">
            <h2 class="similarPosts__title">You might also like</h2>
            <div class="similarPosts__list row">
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>
                    <div class="similarPosts__itemWrapper col-lg-4 col-md-6 col-12">
                        <a class="similarPosts__item" href="<?php the_permalink(  ); ?>">
                            <div class="similarPosts__itemImage"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></div>
                            <div class="similarPosts__itemDate"><?php echo get_the_date( 'j F Y' ); ?></div>
                            <div class="similarPosts__itemTitle"><?php the_title(); ?></div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>