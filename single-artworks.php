<?php
/**
 * Template Name: Course
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */


get_header();

?>
    <main id="main" class="site-main transition-opacity ease-in delay-100 duration-300" style="opacity: 0" role="main">
        <div class="single-courses__content h-90 md:h-96 w-full">
            <?php get_template_part('template-parts/gallery'); ?>
        </div>
    </main>
    <div class="loading-spin | absolute w-screen h-screen top-0 right-0 overflow-hidden -z-10 bg-no-repeat bg-center transition-opacity ease-out duration-300" style="background-image: url('<?php echo esc_url(AA_BUILD_IMG_URI . '/Spin-1s-50px.svg') ?>'); opacity: 1">
    </div>
<?php
get_footer();