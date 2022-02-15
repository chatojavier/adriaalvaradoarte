<?php
/**
 * Template part for displaying a Gallery.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */

$gallery = get_field('gallery');
if ($gallery) :
?>
<!-- Swiper -->
<div class="gallery__content relative">
    <div class="swiper-container gallery__content--carousel">
        <div class="swiper-wrapper h-90 md:h-96 items-center">
            <?php
            foreach( $gallery as $image_id ):
                $image_data   = wp_get_attachment_image_src( $image_id, 'aa_gallery' );
                $image_src    = $image_data[0];
                $image_srcset = wp_get_attachment_image_srcset( $image_id, 'aa_gallery_retina' );
                $image_alt    = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                $image_height = $image_data[2];
                $image_width  = $image_data[1];
                $img_height   = 384;
                $img_width    = intval(($img_height * $image_width) / $image_height)
                ?>
                <div class="gallery__slide | swiper-slide bg-no-repeat bg-center max-h-full md:h-full w-auto flex md:block items-center" style="background-image: url('<?php echo esc_url(AA_BUILD_IMG_URI . '/Spin-1s-50px.svg') ?>'); background-size: 25px 25px;" data-width="<?php echo $img_width; ?>" data-height="<?php echo $img_height; ?>">
                    <img data-src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" data-srcset="<?php echo $image_srcset; ?>" sizes="(min-width: 768px) <?php echo $img_width; ?>px, 100vw" class="gallery__img swiper-lazy md:h-full w-auto max-h-full mx-auto">
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
    <!-- If we need navigation buttons -->
    <div class="slider-button-prev absolute left-6 | flex justify-center items-center | h-5 w-5 bg-black text-white | transform -translate-y-1/2 top-1/2 | cursor-pointer z-10"><i class="fas fa-angle-left"></i></div>
    <div class="slider-button-next absolute right-6 | flex justify-center items-center | h-5 w-5 bg-black text-white | transform -translate-y-1/2 top-1/2 | cursor-pointer z-10"><i class="fas fa-angle-right"></i></div>
</div><!-- Swiper -->
<?php
endif;