<?php
/**
 * Header Navigation.
 *
 * @package Adria Theme
 */

$header_menu_id = get_menu_id( 'aa-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );

?>

<nav class="header__menu_bar">
    <div class="header__menu-btn | lg:hidden">
        <div class="header__menu-btn__burger"></div>
    </div>
    <div class="header__menu_nav | flex flex-col items-center justify-center | h-screen w-screen fixed top-0 left-0 z-50 | bg-white bg-opacity-80 text-black text-xl | lg:flex-row lg:h-full lg:w-auto lg:items-start lg:justify-end lg:static lg:bg-opacity-0 lg:text-current">
        <ul class="header__menu_nav__items | font-agency uppercase leading-none mb-10 | lg:flex lg:mb-0">
            <?php

            if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
                foreach ( $header_menus as $header_menu ) {
                    echo '<li class="header__menu_nav__items__item | mt-4 lg:inline-block lg:mt-0 mr-5">';
                    if ($header_menu->object_id == 79) {
                        get_template_part( 'template-parts/header/dropdown', '', array('menu' => $header_menu) );
                    }
                    else {
                        printf(
                        '<a class="hover:underline" href="%1$s">%2$s</a>',
                        esc_url( $header_menu->url ),
                        esc_html( $header_menu->title )
                        );
                    }
                    echo '</li>';
                }

            }
            ?>

        </ul>
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
                if( $checked && in_array('header', $checked) ) :
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
</nav>