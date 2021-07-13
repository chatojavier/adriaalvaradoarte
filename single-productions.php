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
        <div class="single-productions__content max-w-lg h-96 mx-auto w-full grid grid-cols-2 gap-5">
            <div class="left-col single-productions__picture">
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
            <div class="right-col single-productions__info flex flex-col justify-between">
                
                <div class="single-productions__info__text">
                    <div class="single-productions__info__title | text-xl font-agency uppercase mb-5">
                        <?php the_title(); ?>
                    </div>
                    <?php
                        $year       = get_field('info')['year'];
                        $role       = get_field('info')['role'];
                        $company    = get_field('info')['company'];
                    ?>
                    <div class="single-productions__info__year | text-sm text-justify font-light leading-tight mb-5">
                        <?php echo $year; ?>
                    </div>
                    <div class="single-productions__info__role | text-sm text-justify font-light leading-tight mb-5">
                        <?php echo $role; ?>
                    </div>
                    <div class="single-productions__info__company | text-sm text-justify font-light leading-tight">
                        <?php echo $company; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();