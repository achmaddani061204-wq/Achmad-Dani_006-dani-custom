<?php get_header(); ?>

<main id="primary" class="site-main content-shell portfolio-project-archive">
    <div class="container">
        <header class="archive-header">
            <p class="eyebrow"><?php esc_html_e('Portofolio', 'dani-custom'); ?></p>
            <h1 class="archive-title"><?php esc_html_e('Proyek dan hasil karya', 'dani-custom'); ?></h1>
            <p class="archive-description"><?php esc_html_e('Ruang untuk melihat proyek, latihan, dan karya digital dari perjalanan belajar saya di bidang desain grafis dan coding.', 'dani-custom'); ?></p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="projects-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $project_demo = get_post_meta(get_the_ID(), '_dani_custom_project_demo_url', true);
                    $project_types = get_the_terms(get_the_ID(), 'dani_project_type');
                    ?>
                    <article <?php post_class('project-card'); ?>>
                        <a class="project-card-image" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('dani-custom-featured', array('loading' => 'lazy')); ?>
                            <?php else : ?>
                                <span class="project-image-placeholder" aria-hidden="true">✳</span>
                            <?php endif; ?>
                            <span class="project-view" aria-hidden="true">↗</span>
                        </a>
                        <div class="project-card-content">
                            <?php if ($project_types && !is_wp_error($project_types)) : ?>
                                <p class="project-category"><?php echo esc_html($project_types[0]->name); ?></p>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="project-excerpt"><?php echo esc_html(get_the_excerpt()); ?></div>
                            <a class="text-link" href="<?php echo esc_url($project_demo ? $project_demo : get_permalink()); ?>"<?php if ($project_demo) : ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                                <?php echo $project_demo ? esc_html__('Lihat hasil', 'dani-custom') : esc_html__('Detail proyek', 'dani-custom'); ?>
                                <span aria-hidden="true"><?php echo $project_demo ? '↗' : '&rarr;'; ?></span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination(array(
                'mid_size'  => 1,
                'prev_text' => __('&larr; Sebelumnya', 'dani-custom'),
                'next_text' => __('Berikutnya &rarr;', 'dani-custom'),
            )); ?>
        <?php else : ?>
            <div class="portfolio-empty-state">
                <span aria-hidden="true">✦</span>
                <p><?php esc_html_e('Belum ada proyek yang dipublikasikan. Silakan kembali lagi nanti.', 'dani-custom'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
