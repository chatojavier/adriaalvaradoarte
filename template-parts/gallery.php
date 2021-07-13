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
        <div class="swiper-wrapper h-90 md:h-96">
            <?php
            foreach( $gallery as $image_id ):
                $image1x      = wp_get_attachment_image_url( $image_id, 'aa_gallery' );
                $image2x      = wp_get_attachment_image_url( $image_id, 'aa_gallery_retina' );
                $image_alt    = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                $image_data   = wp_get_attachment_image_src( $image_id, 'aa_gallery' );
                $image_height = $image_data[2];
                $image_width  = $image_data[1];
                $img_height   = 384;
                $img_width    = intval(($img_height * $image_width) / $image_height)
                ?>
                <div class="gallery__slider | swiper-slide flex items-center justify-center h-auto w-auto bg-no-repeat bg-center" style="background-image: url('<?php echo esc_url(AA_BUILD_IMG_URI . '/Spin-1s-50px.svg') ?>'); background-size: 25px 25px;">
                    <img data-src="<?php echo $image1x; ?>" alt="<?php echo $image_alt; ?>" data-srcset="<?php echo $image2x; ?> 2x" class="gallery__img | h-auto w-auto max-h-90 md:max-h-none md:h-full swiper-lazy" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>">
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