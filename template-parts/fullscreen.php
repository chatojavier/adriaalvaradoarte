<?php
/**
 * Template part for fullscreen image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */
$land_large     = get_field('home_img')['land_large'];
$land_medium    = get_field('home_img')['land_medium'];
$land_small     = get_field('home_img')['land_small'];
$port_large     = get_field('home_img')['port_large'];
$port_medium    = get_field('home_img')['port_medium'];
$port_small     = get_field('home_img')['port_small'];
?>

<picture class="fullscreen-bg | absolute w-screen h-screen top-0 right-0 overflow-hidden -z-10 bg-no-repeat bg-center" style="background-image: url('<?php echo esc_url(AA_BUILD_IMG_URI . '/Spin-1s-50px.svg') ?>')">
    <source media="(min-width: 1440px) and (orientation: landscape)" srcset="<?php echo $land_large; ?> 2x, <?php echo $land_medium; ?> 1x">
    <source media="(min-width: 1280px) and (orientation: landscape)" srcset="<?php echo $land_medium; ?> 2x, <?php echo $land_small; ?> 1x">
    <source media="(min-width: 768px) and (orientation: portrait)" srcset="<?php echo $port_large; ?> 2x, <?php echo $port_medium; ?> 1x">
    <source media="(min-width: 375px) and (orientation: portrait)" srcset="<?php echo $port_medium; ?> 2x, <?php echo $port_small; ?> 1x">
    <img src="<?php echo $land_small; ?>" srcset="<?php echo $land_medium; ?> 2x" alt="" class="w-full h-full object-cover object-center">
</picture>

