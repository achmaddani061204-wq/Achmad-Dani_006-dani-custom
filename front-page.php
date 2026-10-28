<?php get_header(); ?>

<main id="primary" class="site-main front-page portfolio-home">
    <section class="portfolio-hero" id="beranda">
        <div class="container portfolio-hero-layout">
            <div class="portfolio-hero-copy">
                <p class="eyebrow"><?php esc_html_e('Portofolio kreatif & digital', 'dani-custom'); ?></p>
                <h1>Halo, saya <span>Achmad Dani.</span></h1>
                <p class="portfolio-role"><?php esc_html_e('Desain Grafis', 'dani-custom'); ?> <span aria-hidden="true">+</span> <?php esc_html_e('Coding', 'dani-custom'); ?></p>
                <p class="portfolio-study"><?php esc_html_e('Mahasiswa Pendidikan Informatika · Universitas Trunojoyo Madura', 'dani-custom'); ?></p>
                <p class="portfolio-intro">
                    <?php esc_html_e('Saya suka menggabungkan kreativitas visual dengan logika kode. Di sini saya berbagi proses belajar, eksplorasi desain, dan karya digital yang saya bangun.', 'dani-custom'); ?>
                </p>
                <div class="hero-actions">
                    <a class="btn" href="#proyek"><?php esc_html_e('Jelajahi karya', 'dani-custom'); ?> <span aria-hidden="true">&nbsp;→</span></a>
                    <a class="btn btn-secondary" href="#kontak"><?php esc_html_e('Hubungi saya', 'dani-custom'); ?></a>
                </div>
                <div class="portfolio-social-links" aria-label="<?php esc_attr_e('Media sosial', 'dani-custom'); ?>">
                    <a href="https://instagram.com/achmadnx" target="_blank" rel="noopener noreferrer">Instagram <span aria-hidden="true">↗</span></a>
                    <a href="https://tiktok.com/@w_dann1" target="_blank" rel="noopener noreferrer">TikTok <span aria-hidden="true">↗</span></a>
                    <a href="https://wa.me/6285755791757" target="_blank" rel="noopener noreferrer">WhatsApp <span aria-hidden="true">↗</span></a>
                </div>
            </div>

            <div class="portfolio-portrait">
                <div class="portrait-shape" aria-hidden="true"></div>
                <img
                    class="portfolio-profile-photo"
                    src="<?php echo esc_url(get_theme_file_uri('/assets/images/achmad-dani.png')); ?>"
                    alt="<?php esc_attr_e('Foto profil Achmad Dani', 'dani-custom'); ?>"
                    fetchpriority="high"
                >
                <div class="portrait-caption">
                    <span class="portrait-caption-icon" aria-hidden="true">✦</span>
                    <span><strong>Belajar sambil berkarya</strong><small><?php esc_html_e('Pendidikan Informatika · UTM', 'dani-custom'); ?></small></span>
                </div>
            </div>
        </div>
        <a class="hero-scroll-link" href="#tentang"><?php esc_html_e('Kenali saya', 'dani-custom'); ?> <span aria-hidden="true">↓</span></a>
    </section>

    <section class="portfolio-section portfolio-about" id="tentang">
        <div class="container portfolio-about-layout">
            <div>
                <p class="eyebrow"><?php esc_html_e('Tentang saya', 'dani-custom'); ?></p>
                <h2 class="section-heading"><?php esc_html_e('Menghubungkan kreativitas visual dan logika kode.', 'dani-custom'); ?></h2>
            </div>
            <div class="portfolio-about-copy">
                <p>
                    <?php esc_html_e('Saya Achmad Dani, mahasiswa Pendidikan Informatika di Universitas Trunojoyo Madura. Saat ini saya mengeksplorasi desain grafis dan coding—dua cara untuk mengubah ide menjadi sesuatu yang menarik secara visual sekaligus berguna.', 'dani-custom'); ?>
                </p>
                <a class="text-link" href="<?php echo esc_url(dani_custom_page_url('profil')); ?>">
                    <?php esc_html_e('Selengkapnya tentang saya', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <section class="portfolio-section portfolio-education" id="pendidikan">
        <div class="container education-card">
            <span class="education-icon" aria-hidden="true">✳</span>
            <div>
                <p class="eyebrow"><?php esc_html_e('Pendidikan', 'dani-custom'); ?></p>
                <h2><?php esc_html_e('Pendidikan Informatika', 'dani-custom'); ?></h2>
                <p><?php esc_html_e('Universitas Trunojoyo Madura', 'dani-custom'); ?></p>
            </div>
            <span class="education-status"><?php esc_html_e('Mahasiswa', 'dani-custom'); ?></span>
        </div>
    </section>

    <section class="portfolio-section portfolio-skills" id="keahlian">
        <div class="container">
            <div class="portfolio-section-heading">
                <div>
                    <p class="eyebrow"><?php esc_html_e('Yang sedang saya eksplorasi', 'dani-custom'); ?></p>
                    <h2 class="section-heading"><?php esc_html_e('Fokus kreatif', 'dani-custom'); ?></h2>
                </div>
                <p><?php esc_html_e('Dua minat yang saya kembangkan lewat proses belajar dan berkarya.', 'dani-custom'); ?></p>
            </div>

            <?php
            $portfolio_skills = new WP_Query(array(
                'post_type'      => 'dani_skill',
                'post_status'    => 'publish',
                'posts_per_page' => 12,
                'orderby'        => array('menu_order' => 'ASC', 'title' => 'ASC'),
            ));
            ?>

            <?php if ($portfolio_skills->have_posts()) : ?>
                <div class="skills-grid">
                    <?php while ($portfolio_skills->have_posts()) : $portfolio_skills->the_post(); ?>
                        <article class="skill-card">
                            <span class="skill-card-mark" aria-hidden="true">✳</span>
                            <h3><?php the_title(); ?></h3>
                            <?php if (trim(get_the_content()) !== '') : ?>
                                <div class="skill-description"><?php the_content(); ?></div>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="skills-grid">
                    <article class="skill-card">
                        <span class="skill-card-mark" aria-hidden="true">✳</span>
                        <h3><?php esc_html_e('Desain Grafis', 'dani-custom'); ?></h3>
                        <p class="skill-description"><?php esc_html_e('Mengeksplorasi warna, tipografi, dan komposisi untuk menyampaikan ide dengan jelas.', 'dani-custom'); ?></p>
                    </article>
                    <article class="skill-card">
                        <span class="skill-card-mark skill-card-mark-code" aria-hidden="true">&lt;/&gt;</span>
                        <h3><?php esc_html_e('Coding', 'dani-custom'); ?></h3>
                        <p class="skill-description"><?php esc_html_e('Belajar membangun halaman web yang rapi, responsif, dan nyaman digunakan.', 'dani-custom'); ?></p>
                    </article>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="portfolio-section portfolio-projects" id="proyek">
        <div class="container">
            <div class="portfolio-section-heading">
                <div>
                    <p class="eyebrow"><?php esc_html_e('Proyek dan hasil karya', 'dani-custom'); ?></p>
                    <h2 class="section-heading"><?php esc_html_e('Karya pilihan', 'dani-custom'); ?></h2>
                </div>
                <a class="text-link" href="<?php echo esc_url(get_post_type_archive_link('dani_project')); ?>">
                    <?php esc_html_e('Semua proyek', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <?php
            $portfolio_projects = new WP_Query(array(
                'post_type'           => 'dani_project',
                'post_status'         => 'publish',
                'posts_per_page'      => 6,
                'orderby'             => array('menu_order' => 'ASC', 'date' => 'DESC'),
                'ignore_sticky_posts' => true,
            ));
            ?>

            <?php if ($portfolio_projects->have_posts()) : ?>
                <div class="projects-grid">
                    <?php while ($portfolio_projects->have_posts()) : $portfolio_projects->the_post(); ?>
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
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="project-excerpt">
                                    <?php echo esc_html(get_the_excerpt()); ?>
                                </div>
                                <?php if ($project_demo) : ?>
                                    <a class="text-link" href="<?php echo esc_url($project_demo); ?>" target="_blank" rel="noopener noreferrer">
                                        <?php esc_html_e('Lihat hasil', 'dani-custom'); ?> <span aria-hidden="true">↗</span>
                                    </a>
                                <?php else : ?>
                                    <a class="text-link" href="<?php the_permalink(); ?>">
                                        <?php esc_html_e('Detail proyek', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="portfolio-empty-state">
                    <span aria-hidden="true">✦</span>
                    <p><?php esc_html_e('Proyek dan hasil karya akan ditampilkan di sini.', 'dani-custom'); ?></p>
                    <?php if (current_user_can('edit_posts')) : ?>
                        <a class="text-link" href="<?php echo esc_url(admin_url('post-new.php?post_type=dani_project')); ?>">
                            <?php esc_html_e('Tambahkan proyek pertama', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php
    $default_sample_post = get_page_by_path('hello-world', OBJECT, 'post');
    $recent_posts = new WP_Query(array(
        'post_type'           => 'post',
        'posts_per_page'      => 3,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'post__not_in'        => $default_sample_post ? array($default_sample_post->ID) : array(),
    ));
    ?>

    <section class="portfolio-section portfolio-articles" id="artikel">
        <div class="container">
            <div class="portfolio-section-heading">
                <div>
                    <p class="eyebrow"><?php esc_html_e('Catatan dan pembelajaran', 'dani-custom'); ?></p>
                    <h2 class="section-heading"><?php esc_html_e('Artikel terbaru', 'dani-custom'); ?></h2>
                </div>
                <?php if (get_option('page_for_posts')) : ?>
                    <a class="text-link" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                        <?php esc_html_e('Semua artikel', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($recent_posts->have_posts()) : ?>
                <div class="home-post-grid">
                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="portfolio-empty-state">
                    <span aria-hidden="true">✦</span>
                    <p><?php esc_html_e('Artikel, catatan belajar, dan cerita baru akan muncul di sini.', 'dani-custom'); ?></p>
                    <?php if (current_user_can('publish_posts')) : ?>
                        <a class="text-link" href="<?php echo esc_url(admin_url('post-new.php')); ?>">
                            <?php esc_html_e('Tulis artikel pertama', 'dani-custom'); ?> <span aria-hidden="true">&rarr;</span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="portfolio-section portfolio-contact" id="kontak">
        <div class="container portfolio-contact-layout">
            <div class="portfolio-contact-copy">
                <p class="eyebrow"><?php esc_html_e('Kontak', 'dani-custom'); ?></p>
                <h2 class="section-heading"><?php esc_html_e('Punya ide atau ingin berkolaborasi?', 'dani-custom'); ?></h2>
                <p><?php esc_html_e('Saya terbuka untuk bertukar pikiran, belajar bersama, dan berkolaborasi. Silakan kirim pesan atau hubungi saya melalui media sosial.', 'dani-custom'); ?></p>
                <div class="portfolio-contact-socials">
                    <a href="https://instagram.com/achmadnx" target="_blank" rel="noopener noreferrer">Instagram <span>@achmadnx</span></a>
                    <a href="https://wa.me/6285755791757" target="_blank" rel="noopener noreferrer">WhatsApp <span>085755791757</span></a>
                    <a href="https://tiktok.com/@w_dann1" target="_blank" rel="noopener noreferrer">TikTok <span>@w_dann1</span></a>
                </div>
            </div>
            <div class="portfolio-contact-form-wrap">
                <?php get_template_part('template-parts/contact', 'form'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
