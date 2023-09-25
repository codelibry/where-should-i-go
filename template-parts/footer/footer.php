<?php 
$title = get_field('form_title', 'options');
$form = get_field('form', 'options');
$contact = get_field('footer_contact_text', 'options');
$privacy = get_field('footer_privacy_text', 'options');
$button = get_field('footer_mobile_button', 'options');
?>
<footer class="footer">
    <div class="container">
        <div class="footer__content row">
            <div class="footer__formWrapper col-lg-6 col-md-7 col-12 animate fade-right">
                <?php if($title): ?>
                    <h2 class="footer__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($form): ?>
                    <div class="footer__form">
                        <?php echo $form; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer__text col-lg-3 col-md-5 col-12 animate fade-left delay-1">
                <?php if($contact): ?>
                    <div class="footer__contact">
                        <?php echo $contact; ?>
                    </div>
                <?php endif; ?>
                <?php if(have_rows('social_icons', 'options')): ?>
                    <div class="footer__socialIcons">
                        <?php while(have_rows('social_icons' , 'options')): the_row(); ?>
                            <?php 
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                            ?>
                            <a href="<?php echo $link['url']; ?>" target="_blank" class="footer__socialIcon"><img src="<?php echo $icon['url']; ?>" alt=""></a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if($privacy): ?>
                    <div class="footer__privacy"><?php echo $privacy; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($button): ?>
            <div class="footer__button"><a href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a></div>
        <?php endif; ?>
    </div>
</footer>
<?php 
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
    
?>
<script>
    <?php while($the_query->have_posts()): $the_query->the_post(); ?>
        <?php 
            $post = get_post(get_the_ID()); 
            $slug = $post->post_name;
            $email_text = get_field('email_text');
        ?>
            var <?php echo $slug; ?>-text = <?php echo get_field('email_text'); ?>;
            console.log(<?php $slug; ?>-text);
    <?php endwhile; ?>
</script>
<?php endif; ?>