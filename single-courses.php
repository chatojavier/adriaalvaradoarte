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
        <div class="single-courses__content max-w-lg px-1/15 md:px-0 lg:h-96 mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="left-col single-courses__picture  | h-96 lg:h-auto">
            <?php
            $img_id = get_field('image');
            if ($img_id) :
                $img1x = wp_get_attachment_image_url( $img_id, 'aa_gallery' );
                $img2x = wp_get_attachment_image_url( $img_id, 'aa_gallery_retina' );
                ?>
                <img src="<?php echo $img1x; ?>" alt="Adria Álvarez" srcset="<?php echo $img2x; ?> 2x" class="object-cover w-full h-full">
                <?php
            endif;
            ?>
            </div>
            <div class="right-col single-courses__info flex flex-col justify-between">
                
                <div class="single-courses__info__text mb-5 md:mb-0">
                    <div class="single-courses__info__title | text-xl font-agency uppercase mb-5">
                        <?php the_title(); ?>
                    </div>
                    <?php
                        $duration    = get_field('info')['duration'];
                        $description = get_field('info')['description'];
                    ?>
                    <div class="single-courses__info__duration | text-sm text-justify font-light leading-tight mb-5">
                        <?php echo $duration; ?>
                    </div>
                    <div class="single-courses__info__description | text-sm text-justify font-light leading-tight">
                        <?php echo $description; ?>
                    </div>
                </div>
                <div class="single-courses__contact-form">
                    <p class="text-base font-normal">
                        For more information please leave us your name and email:
                    </p>
                    <?php echo do_shortcode('[wpforms id="67"]');?>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();