<?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside class="site-sidebar" aria-label="<?php esc_attr_e('Sidebar', 'dani-custom'); ?>">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php else : ?>
    <aside class="site-sidebar">
        <section class="widget profile-widget">
            <img
                src="<?php echo esc_url(get_theme_file_uri('/assets/images/achmad-dani.png')); ?>"
                alt=""
                width="72"
                height="72"
                loading="lazy"
            >
            <h2 class="widget-title"><?php esc_html_e('Tentang penulis', 'dani-custom'); ?></h2>
            <p><?php esc_html_e('Kenali lebih dekat Achmad Dani dan temukan cara untuk terhubung.', 'dani-custom'); ?></p>
            <a class="text-link" href="<?php echo esc_url(dani_custom_page_url('profil')); ?>"><?php esc_html_e('Lihat profil', 'dani-custom'); ?> &rarr;</a>
        </section>
        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e('Cari artikel', 'dani-custom'); ?></h2>
            <?php get_search_form(); ?>
        </section>
        <?php if (get_categories(array('hide_empty' => true))) : ?>
            <section class="widget">
                <h2 class="widget-title"><?php esc_html_e('Kategori', 'dani-custom'); ?></h2>
                <ul>
                    <?php
                    wp_list_categories(array(
                        'title_li'   => '',
                        'show_count' => true,
                        'hide_empty' => true,
                    ));
                    ?>
                </ul>
            </section>
        <?php endif; ?>
    </aside>
<?php endif; ?>
