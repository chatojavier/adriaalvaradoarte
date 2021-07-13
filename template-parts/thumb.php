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
    <a href="<?php echo get_permalink(); ?>">
        <div class="loop__picture w-60 h-96">
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
        </div>
        <div class="loop__hover_info p-4 bg-black bg-opacity-80 flex flex-col justify-center items-center absolute top-0 w-full h-full text-white | opacity-0 hover:opacity-100 transition-opacity ease-in-out duration-300">
            <h3 class="font-agency text-xl uppercase">
                <?php the_title(); ?>
            </h3>
            <?php
            $duration = get_field('info')['duration'];
            if ($duration) : ?>
                <div class="course_duration font-light text-sm">
                    <?php echo $duration; ?>
                </div>
                <?php
            endif; ?>
        </div>
    </a>
</div>