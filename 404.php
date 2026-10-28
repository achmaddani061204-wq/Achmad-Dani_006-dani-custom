<?php get_header(); ?>

<main id="primary" class="site-main error-page">
    <div class="container narrow-content">
        <p class="error-code">404</p>
        <p class="eyebrow"><?php esc_html_e('Halaman tidak ditemukan', 'dani-custom'); ?></p>
        <h1 class="section-heading"><?php esc_html_e('Sepertinya halaman ini tersesat.', 'dani-custom'); ?></h1>
        <p class="error-description">
            <?php esc_html_e('Alamat mungkin sudah berubah atau halaman yang Anda cari tidak tersedia. Coba cari halaman lain atau kembali ke beranda.', 'dani-custom'); ?>
        </p>
        <?php get_search_form(); ?>
        <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Kembali ke beranda', 'dani-custom'); ?></a>
    </div>
</main>

<?php get_footer(); ?>
