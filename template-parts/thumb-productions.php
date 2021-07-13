<?php
/**
 * Template part for displaying posts thumbs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adria
 */

?>

<div id="<?php echo get_post_type() . '-' . get_the_ID(); ?>" class="relative">
    <!-- <a href="<?php echo get_permalink(); ?>"> -->
        <div class="loop__picture w-60 h-96 relative">
        <?php
        $img = has_post_thumbnail();
        if ($img) :
            $img1x = get_the_post_thumbnail_url( get_the_ID(), 'aa_gallery' );
            $img2x = get_the_post_thumbnail_url( get_the_ID(), 'aa_gallery_retina' );
            ?>
            <img src="<?php echo $img1x; ?>" alt="Adria Álvarez" srcset="<?php echo $img2x; ?> 2x" class="object-cover w-full h-full">
            <?php
        endif;
        ?>
            <div class="loop__hover_info p-4 bg-black bg-opacity-80 absolute top-0 w-full h-full text-white | opacity-0 hover:opacity-100 transition-opacity ease-in-out duration-300">
            <div class="loop__hover_container w-full">
                <h3 class="font-agency text-xl uppercase mb-4">
                    <?php the_title(); ?>
                </h3>
                <?php
                $year    = get_field('info')['year'];
                $role    = get_field('info')['role'];
                $company = get_field('info')['company'];
                if ($year) : ?>
                    <div class="loop__hover_info__description flex justify-between">
                        <div class="col-left">
                            <div class="course_duration font-light text-sm mb-4 uppercase">
                                Year:
                            </div>
                            <div class="course_duration font-light text-sm mb-4">
                                Role:
                            </div>
                            <div class="course_duration font-light text-sm">
                                Company:
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="course_duration font-light text-sm mb-4">
                                <?php echo $year; ?>
                            </div>
                            <div class="course_duration font-light text-sm mb-4">
                                <?php echo $role; ?>
                            </div>
                            <div class="course_duration font-light text-sm">
                                <?php echo $company; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endif; ?>
            </div>
        </div>
        </div>
        
    <!-- </a> -->
</div>