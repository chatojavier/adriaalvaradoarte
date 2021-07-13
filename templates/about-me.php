<?php
/**
 * Template Name: About Me
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */


get_header();

?>
    <main id="main" class="site-main transition-opacity ease-in delay-100 duration-300" style="opacity: 0" role="main">
        <div class="about-me__content max-w-lg px-1/15 md:px-0 lg:h-96 mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="left-col about-me__picture | h-96 lg:h-auto">
            <?php
            $img_id = get_field('my_picture');
            if ($img_id) :
                $img1x = wp_get_attachment_image_url( $img_id, 'aa_gallery' );
                $img2x = wp_get_attachment_image_url( $img_id, 'aa_gallery_retina' );
                ?>
                <img src="<?php echo $img1x; ?>" alt="Adria Álvarez" srcset="<?php echo $img2x; ?> 2x" class="object-cover w-full h-full">
                <?php
            endif;
            ?>
            </div>
            <div class="right-col about-me__bio text-sm flex flex-col justify-between">
                <div class="about-me__bio__text | text-justify font-light leading-tight">
                    <?php
                    $bio = get_field('my_bio');
                        echo $bio;
                    ?>
                </div>
                <?php get_template_part( 'template-parts/about', 'social_icons' ); ?>
            </div>
        </div>
    </main>
<?php
get_footer();