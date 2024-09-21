	</div>

	<?php get_template_part( 'template-parts/footer/footer' ); ?>


	<div id="welcome-discount-popup" class="popup-block" style="">
		<div class="popup-block__wrapper">
			<div class="popup-block__inner">
				<div class="popup-block__box global-form-styles">
					<div class="popup-block__close"></div>

					<div class="popup-block__header text-center">
						<div class="h1">20% OFF</div>
						<div class="h5">YOUR PERSONALIZED GUIDE</div>
					</div>
					
					<?php echo do_shortcode('[ninja_form id=8]'); ?>
				</div>
			</div>
		</div>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
