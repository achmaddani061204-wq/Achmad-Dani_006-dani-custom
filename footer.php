<footer class="site-footer">
    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
        <div class="container footer-widgets">
            <?php for ($column = 1; $column <= 3; $column++) : ?>
                <?php if (is_active_sidebar('footer-' . $column)) : ?>
                    <div class="footer-widget-column">
                        <?php dynamic_sidebar('footer-' . $column); ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <div class="container footer-bottom">
        <p>
            &copy; <?php echo esc_html(wp_date('Y')); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>.
            <?php esc_html_e('Hak cipta dilindungi.', 'dani-custom'); ?>
        </p>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'container'      => 'nav',
            'container_class'=> 'footer-navigation',
            'container_aria_label' => __('Menu footer', 'dani-custom'),
            'fallback_cb'    => false,
            'depth'          => 1,
        ));
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
