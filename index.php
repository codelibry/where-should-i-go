<?php 

/*
Template Name: Index
*/

get_header(); 

$title = get_the_title(get_option('page_for_posts'));
$text = get_field('hero_text', get_option('page_for_posts'));

?>

<div class="page-blocks">

    <?php if($title || $text): ?>

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

    <section class="favoritiesBlock favoritiesBlock--blog">
        <div class="container">

            <div class="favoritiesBlock__list">
                <?php if(have_posts()) : ?>

                    <?php $i = 1; while(have_posts()): the_post(); 

                    if($i % 2 == 0){
                        $delay = ' delay-2';
                    } ?>

                    <?php if($i % 2 != 0): ?>
                        <div class="favoritiesBlock__row">
                    <?php endif; ?>

                    <div class="favoritiesBlock__listItem product animate fade-up<?php echo $delay; ?>">
                        <div class="favoritiesBlock__listItem__head">
                            <div class="favoritiesBlock__listItem__sideContent">
                                <div class="favoritiesBlock__listItem__content h4">
                                    <h4 class="favoritiesBlock__listItem__title product-title"><?php the_title(); ?></h4>
                                </div>
                            </div>
                            <div class="favoritiesBlock__listItem__image product-image">
                                <div class="parallax-img-wrapper">
                                    <img src="<?php if(!empty(get_the_post_thumbnail_url( ))){ echo get_the_post_thumbnail_url(); }else{ echo get_template_directory_uri(  ) . '/assets/images/placeholder.png'; } ?>" alt="" class="parallax-img">
                                </div>
                            </div>
                        </div>
                        <div class="favoritiesBlock__listItem__body">
                            <div class="favoritiesBlock__listItem__textWrapper">
                                <?php if(!empty(get_the_excerpt())): ?>
                                    <div class="favoritiesBlock__listItem__text" style="-webkit-box-orient: vertical;"><?php the_excerpt(); ?></div>
                                <?php endif; ?>
                                
                                    <a href="<?php the_permalink();?>" class="favoritiesBlock__listItem__button"><?php _e('Read More', 'wsig');?></a>
                                
                            </div>
                        </div>
                    </div>
                    <?php if($i % 2 == 0): ?>
                        </div>
                    <?php endif; ?>
                    <?php $i++; endwhile;  ?>

                <?php else : ?>
                    <h3><?php _e('Sorry, no posts to show yet', 'wsig');?></h3>
                <?php endif;?>

            </div>

            <?php if (get_the_posts_pagination()) : ?>
                <div class="pagination-wrapper"><?php the_posts_pagination(); ?></div> 
            <?php endif; ?>

        </div>
    </section>


</div>

<?php get_footer(); ?>
