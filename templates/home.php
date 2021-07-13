<?php
/**
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */


get_header();

?>
    <main id="main" class="site-main transition-opacity ease-in delay-100 duration-300" style="opacity: 0" role="main">
        <?php get_template_part( '/template-parts/fullscreen' ); ?>
    </main>
<?php

get_footer();