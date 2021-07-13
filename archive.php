<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */

get_header();
?>
	<main id="primary" class="site-main transition-opacity ease-in delay-100 duration-300" style="opacity: 0">
		<!-- Swiper -->
		<div class="loop__content w-full relative">
			<div class="swiper-container loop__content--carousel sm:max-w-500 md:max-w-760 lg:max-w-1024 h-96 mx-auto w-full">
			<div class="swiper-wrapper flex">
				<?php
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					// get_template_part( 'template-parts/thumb', get_post_type() );
					?>
					<div class="loop_slider swiper-slide h-96 w-60">
						<?php get_template_part( 'template-parts/thumb', get_post_type() ); ?>
					</div>
					<?php

				endwhile;
				?>
			</div>
			</div>
			<!-- If we need navigation buttons -->
			<div class="slider-button-prev absolute left-6 | flex justify-center items-center | h-5 w-5 bg-black text-white | transform -translate-y-1/2 top-1/2 | cursor-pointer z-20"><i class="fas fa-angle-left"></i></div>
			<div class="slider-button-next absolute right-6 | flex justify-center items-center | h-5 w-5 bg-black text-white | transform -translate-y-1/2 top-1/2 | cursor-pointer z-20"><i class="fas fa-angle-right"></i></div>
		</div><!-- Swiper -->

	</main><!-- #main -->
	<div class="loading-spin | absolute w-screen h-screen top-0 right-0 overflow-hidden -z-10 bg-no-repeat bg-center transition-opacity ease-out duration-300" style="background-image: url('<?php echo esc_url(AA_BUILD_IMG_URI . '/Spin-1s-50px.svg') ?>'); opacity: 1"></div>
<?php

get_footer();
