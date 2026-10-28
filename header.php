<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e('Lewati ke konten', 'dani-custom'); ?></a>

<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
            <?php $description = get_bloginfo('description', 'display'); ?>
            <?php if ($description || is_customize_preview()) : ?>
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
            <span class="menu-toggle-icon" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php esc_html_e('Buka menu', 'dani-custom'); ?></span>
        </button>

        <nav class="primary-navigation" aria-label="<?php esc_attr_e('Menu utama', 'dani-custom'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => 'dani_custom_menu_fallback',
            ));
            ?>
        </nav>

        <div class="header-search">
            <?php get_search_form(); ?>
        </div>
    </div>
</header>
