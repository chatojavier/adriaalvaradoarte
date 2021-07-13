<?php

/**
 * Social Icons template part.
 */ 

if( have_rows('social_icons', 'option') ) : ?>
<div class="about-me__bio__social-icons | space-x-4 mt-5">
    <?php
    if( have_rows('social_icons', 'option') ) : ?>
        <div class="text-sm font-medium md:flex space-x-4">
            <?php 
            while( have_rows('social_icons', 'option') ) : the_row();
            $icon         = get_sub_field('icon');
            $name         = get_sub_field('name');
            $url_or_email = get_sub_field('url_or_email')[0]['acf_fc_layout'];
            $href         = ($url_or_email == 'url') ? get_sub_field('url_or_email')[0][$url_or_email] : 'mailto:' . get_sub_field('url_or_email')[0][$url_or_email];
            $checked      = get_sub_field('page_to_show');
            if( $checked && in_array('aboutme', $checked) ) :
            ?>
            <a href="<?php echo $href ?>" class="text-xl" target="_blank">
                <?php echo $icon ?>
            </a>
            <?php 
            endif;
            endwhile;
            ?>
        </div>
        <?php
    endif; ?>
</div>
<?php endif;