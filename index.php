<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */

get_header();

?>
    <main id="main" class="site-main max-w-1280 m-auto mt-4 lg:p-4" role="main">
        <?php get_template_part( '/template-parts/fullscreen' ); ?>
    </main>
<?php

get_footer();
