<?php get_header(); ?>

<main id="primary" class="site-main content-shell">
    <div class="container content-layout">
        <div class="content-primary">
            <header class="archive-header">
                <p class="eyebrow"><?php esc_html_e('Jelajahi tulisan', 'dani-custom'); ?></p>
                <?php the_archive_title('<h1 class="archive-title">', '</h1>'); ?>
                <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
            </header>

            <?php if (have_posts()) : ?>
                <div class="post-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination(array(
                    'mid_size'  => 1,
                    'prev_text' => __('&larr; Sebelumnya', 'dani-custom'),
                    'next_text' => __('Berikutnya &rarr;', 'dani-custom'),
                )); ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
