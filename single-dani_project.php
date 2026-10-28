<?php get_header(); ?>

<main id="primary" class="site-main content-shell single-project-page">
    <div class="container narrow-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $project_demo = get_post_meta(get_the_ID(), '_dani_custom_project_demo_url', true);
            $project_source = get_post_meta(get_the_ID(), '_dani_custom_project_source_url', true);
            $project_types = get_the_terms(get_the_ID(), 'dani_project_type');
            ?>
            <article <?php post_class('single-article'); ?>>
                <header class="entry-header">
                    <p class="eyebrow"><?php esc_html_e('Detail proyek', 'dani-custom'); ?></p>
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <?php if ($project_types && !is_wp_error($project_types)) : ?>
                        <div class="entry-categories">
                            <?php foreach ($project_types as $project_type) : ?>
                                <a href="<?php echo esc_url(get_term_link($project_type)); ?>"><?php echo esc_html($project_type->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <figure class="entry-featured-image">
                        <?php the_post_thumbnail('dani-custom-featured'); ?>
                        <?php if (get_the_post_thumbnail_caption()) : ?>
                            <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>

                <?php if (has_excerpt()) : ?>
                    <p class="project-lead"><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php endif; ?>

                <div class="entry-content"><?php the_content(); ?></div>

                <?php if ($project_demo || $project_source) : ?>
                    <div class="project-actions">
                        <?php if ($project_demo) : ?>
                            <a class="btn" href="<?php echo esc_url($project_demo); ?>" target="_blank" rel="noopener noreferrer">
                                <?php esc_html_e('Lihat proyek', 'dani-custom'); ?> <span aria-hidden="true">&nbsp;↗</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($project_source) : ?>
                            <a class="btn btn-secondary" href="<?php echo esc_url($project_source); ?>" target="_blank" rel="noopener noreferrer">
                                <?php esc_html_e('Lihat sumber', 'dani-custom'); ?> <span aria-hidden="true">&nbsp;↗</span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>

            <nav class="post-navigation" aria-label="<?php esc_attr_e('Navigasi proyek', 'dani-custom'); ?>">
                <div class="post-navigation-previous"><?php previous_post_link('%link', '&larr; %title', false, '', 'dani_project_type'); ?></div>
                <div class="post-navigation-next"><?php next_post_link('%link', '%title &rarr;', false, '', 'dani_project_type'); ?></div>
            </nav>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
