<?php get_header(); ?>

<main id="primary" class="site-main content-shell">
    <div class="container content-layout">
        <div class="content-primary">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'single'); ?>

                <nav class="post-navigation" aria-label="<?php esc_attr_e('Navigasi artikel', 'dani-custom'); ?>">
                    <div class="post-navigation-previous"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                    <div class="post-navigation-next"><?php next_post_link('%link', '%title &rarr;'); ?></div>
                </nav>

                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
