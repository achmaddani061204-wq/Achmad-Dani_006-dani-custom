<?php get_header(); ?>

<main id="primary" class="site-main content-shell">
    <div class="container narrow-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>

            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
