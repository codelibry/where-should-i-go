<?php 

/*
Template Name: Index
*/

get_header(); 

if (is_author()) : 

    the_post();
    $title = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id ); 
    $text = get_field('bio', 'user_' .  get_the_author_meta( 'ID', $author_id ));
    $img = get_field('image', 'user_' .  get_the_author_meta( 'ID', $author_id ));
    rewind_posts();

else : 

    $title = get_the_title(get_option('page_for_posts'));
    $text = get_field('hero_text', get_option('page_for_posts'));

endif; 

?>

<div class="page-blocks">

    <?php if($title || $text): ?>

    <section class="hero">
        <div class="container">

            <?php if (is_author()) : ?>

                <div class="row single-post">

                    <div class="hero__content col-lg-8<?php if($img){echo ' has-image';} ?>">

                        <?php if($title): ?>
                            <h1 class="hero__title sm"><?php echo $title; ?></h1>
                        <?php endif; ?> 

                        <?php if($text): ?>
                            <div class="hero__text content-block"><?php echo $text; ?></div>
                        <?php endif; ?>

                    </div>

                    <?php if ($img) : ?>

                        <div class="col-lg-4 hero__img-column">
                            <div class="hero__img-wrapper">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>">
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            <?php else : ?>

                <div class="hero__content">

                    <?php if($title): ?>
                        <h1 class="hero__title sm"><?php echo $title; ?></h1>
                    <?php endif; ?> 

                    <?php if($text): ?>
                        <div class="hero__text"><?php echo $text; ?></div>
                    <?php endif; ?>

                </div>

            <?php endif; ?>

        </div>
    </section>

    <?php endif; ?>

    <section class="favoritiesBlock favoritiesBlock--blog">
        <div class="container">

            <div class="favoritiesBlock__list">
                
                <div class="favoritiesBlock__row">
                <?php if(have_posts()) : ?>

                    <?php $i = 1; while(have_posts()): the_post(); 

                    if($i % 2 == 0){
                        $delay = ' delay-2';
                    } ?>

                    
                    <div class="favoritiesBlock__listItem__wrapper">
                        <a class="favoritiesBlock__listItem product animate fade-up<?php echo $delay; ?>" href="<?php the_permalink();?>">
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
                                    
                                    <div class="favoritiesBlock__listItem__button"><?php _e('Read More', 'wsig');?></div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <?php $i++; endwhile;  ?>

                <?php else : ?>
                    <h3><?php _e('Sorry, no posts to show yet', 'wsig');?></h3>
                <?php endif;?>

                </div>

            </div>

            <?php if (get_the_posts_pagination()) : ?>
                <div class="pagination-wrapper"><?php the_posts_pagination(); ?></div> 
            <?php endif; ?>

        </div>
    </section>


</div>

<?php get_footer(); ?>
