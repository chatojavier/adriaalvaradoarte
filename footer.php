<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adria
 */

 wp_reset_query();

?>

	<footer id="colophon" class="site-footer | w-full p-6">
		<div class="site-info flex flex-col md:flex-row md:items-end">
			<?php if(!is_page('home') && !is_home() && !is_front_page()) : ?>
				<div class="footer__title | w-full md:w-auto py-2 md:px-24 bg-black text-white text-center font-agency inline-block uppercase text-xl md:mr-5 order-2 md:order-1">
					<?php 
					if (is_archive(  )) {
						if (single_term_title()) {
							echo single_term_title();
						} else {
							echo post_type_archive_title();
						}
					} 
					else {
						the_title( );
					}
					?>
				</div>
				<?php if (get_the_content()) : ?>
				<div class="footer__description inline-block text-xs leading-tight md:leading-snug md:w-96 order-1 md:order-2 mb-5 md:mb-0">
					<?php the_content( ); ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
