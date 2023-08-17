<?php 
/*
Template Name: Terms and Conditions
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
                <h1 class="hero__title"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if($text): ?>
                <div class="hero__text"><?php echo $text; ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php 
$text = get_field('text_block');
if($text):
?>
<section class="termsText">
    <div class="container">
        <div class="termsText__content content-block">
            <?php echo $text; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>