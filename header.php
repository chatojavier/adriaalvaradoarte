<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adria
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site <?php echo $post->post_name; ?> | h-screen flex flex-col justify-between">
	<?php
	if ( is_page('home') || is_home() || is_front_page() ) :
		?>
		<header id="masthead" class="site-header w-full p-6 bg-gradient-to-b from-black to-transparent flex justify-between text-white z-10">
			<div class="site-branding">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo AA_BUILD_IMG_URI . '/aa_logo_w.svg' ?>" alt="Logo Adriana Álvarez" class="w-18 md:w-24"></a>
			</div><!-- .site-branding -->

				<?php
				get_template_part( 'template-parts/header', 'nav' );
				?>
		</header><!-- #masthead -->
	<?php else : ?>
		<header id="masthead" class="site-header w-full p-6 bg-gradient-to-b flex justify-between bg-white">
			<div class="site-branding">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo AA_BUILD_IMG_URI . '/aa_logo.svg' ?>" alt="Logo Adriana Álvarez" class="w-18 md:w-24"></a>
			</div><!-- .site-branding -->

				<?php
				get_template_part( 'template-parts/header', 'nav' );
				?>
		</header><!-- #masthead -->
	<?php endif; ?>