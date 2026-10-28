<?php get_header(); ?>

<main class="profile-page">
    <section class="profile-hero">
        <div class="container profile-layout">
            <div class="profile-photo-wrap">
                <img
                    class="profile-photo"
                    src="<?php echo esc_url(get_theme_file_uri('/assets/images/achmad-dani.png')); ?>"
                    alt="Foto profil Achmad Dani"
                >
                <span class="profile-photo-accent" aria-hidden="true"></span>
            </div>

            <div class="profile-intro">
                <p class="eyebrow">Kenalan lebih dekat</p>
                <h1>Halo, saya <span>Achmad Dani.</span></h1>
                <p class="profile-lead">
                    Saya adalah mahasiswa Pendidikan Informatika di Universitas Trunojoyo Madura.
                    Saya senang belajar, mengeksplorasi teknologi, dan mengembangkan karya digital.
                </p>
                <a class="btn" href="<?php echo esc_url(dani_custom_page_url('kontak')); ?>">Hubungi saya <span aria-hidden="true">&nbsp;→</span></a>
            </div>
        </div>
    </section>

    <section class="profile-details">
        <div class="container profile-details-layout">
            <div>
                <p class="eyebrow">Tentang saya</p>
                <h2 class="section-heading">Kreatif, terus belajar, dan siap berkarya.</h2>
            </div>
            <p>
                Saya sedang menempuh studi Pendidikan Informatika di Universitas Trunojoyo Madura.
                Portofolio ini menjadi ruang untuk mendokumentasikan perjalanan belajar, proyek,
                dan karya saya. Silakan sapa saya melalui halaman kontak.
            </p>
        </div>
    </section>

    <section class="profile-highlights">
        <div class="container">
            <div class="profile-highlights-heading">
                <div>
                    <p class="eyebrow">Minat dan perjalanan</p>
                    <h2 class="section-heading">Hal yang sedang saya kembangkan.</h2>
                </div>
                <p>Belajar visual dan teknologi menjadi cara saya mengeksplorasi ide dan membangun karya digital.</p>
            </div>

            <div class="profile-highlight-grid">
                <article class="profile-highlight-card profile-highlight-design">
                    <span class="profile-highlight-icon" aria-hidden="true">✳</span>
                    <p class="profile-highlight-label">Minat kreatif</p>
                    <h3>Desain grafis</h3>
                    <p>Mengeksplorasi warna, tipografi, dan komposisi untuk menyampaikan ide dengan menarik dan jelas.</p>
                </article>

                <article class="profile-highlight-card profile-highlight-code">
                    <span class="profile-highlight-icon" aria-hidden="true">&lt;/&gt;</span>
                    <p class="profile-highlight-label">Minat teknologi</p>
                    <h3>Coding</h3>
                    <p>Belajar membangun halaman web yang rapi, responsif, dan nyaman digunakan.</p>
                </article>

                <article class="profile-highlight-card profile-highlight-study">
                    <span class="profile-highlight-icon" aria-hidden="true">✦</span>
                    <p class="profile-highlight-label">Pendidikan</p>
                    <h3>Pendidikan Informatika</h3>
                    <p>Menempuh studi di Universitas Trunojoyo Madura sambil mendokumentasikan proses belajar dan karya.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="profile-journey">
        <div class="container profile-journey-layout">
            <div class="profile-journey-heading">
                <p class="eyebrow">Perjalanan saya</p>
                <h2 class="section-heading">Belajar, mencoba, lalu membagikan hasilnya.</h2>
                <p>Setiap karya menjadi bagian dari proses belajar dan cara saya mengembangkan ide menjadi sesuatu yang bisa dilihat.</p>
            </div>
            <ol class="profile-journey-list">
                <li>
                    <span class="profile-journey-number">01</span>
                    <div>
                        <h3>Menempuh Pendidikan Informatika</h3>
                        <p>Belajar di Universitas Trunojoyo Madura dan terus memperluas wawasan di bidang informatika.</p>
                    </div>
                </li>
                <li>
                    <span class="profile-journey-number">02</span>
                    <div>
                        <h3>Mengeksplorasi desain dan coding</h3>
                        <p>Mengembangkan minat pada kreativitas visual dan pembuatan halaman web.</p>
                    </div>
                </li>
                <li>
                    <span class="profile-journey-number">03</span>
                    <div>
                        <h3>Mendokumentasikan karya</h3>
                        <p>Mengumpulkan proses belajar, proyek, dan hasil karya digital di portofolio ini.</p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <section class="profile-featured-work">
        <div class="container">
            <div class="profile-highlights-heading">
                <div>
                    <p class="eyebrow">Pilihan karya</p>
                    <h2 class="section-heading">Proyek yang saya kerjakan.</h2>
                </div>
                <a class="text-link" href="<?php echo esc_url(get_post_type_archive_link('dani_project')); ?>">
                    Lihat semua proyek <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <?php
            $profile_projects = new WP_Query(array(
                'post_type'           => 'dani_project',
                'post_status'         => 'publish',
                'posts_per_page'      => 3,
                'orderby'             => array('menu_order' => 'ASC', 'date' => 'DESC'),
                'ignore_sticky_posts' => true,
            ));
            ?>

            <?php if ($profile_projects->have_posts()) : ?>
                <div class="projects-grid">
                    <?php while ($profile_projects->have_posts()) : $profile_projects->the_post(); ?>
                        <?php $project_types = get_the_terms(get_the_ID(), 'dani_project_type'); ?>
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
                                <div class="project-excerpt"><?php echo esc_html(get_the_excerpt()); ?></div>
                                <a class="text-link" href="<?php the_permalink(); ?>">
                                    Lihat detail <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="portfolio-empty-state">
                    <span aria-hidden="true">✦</span>
                    <p>Proyek yang dipublikasikan akan tampil di sini. Sementara itu, Anda bisa mengenal minat dan perjalanan belajar saya.</p>
                    <a class="text-link" href="<?php echo esc_url(get_post_type_archive_link('dani_project')); ?>">
                        Kunjungi halaman proyek <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="profile-next-step">
        <div class="container profile-next-step-inner">
            <div>
                <p class="eyebrow">Mari terhubung</p>
                <h2>Punya ide untuk dibicarakan?</h2>
                <p>Saya terbuka untuk bertukar pikiran, belajar bersama, dan berkolaborasi.</p>
            </div>
            <a class="btn" href="<?php echo esc_url(dani_custom_page_url('kontak')); ?>">
                Hubungi saya <span aria-hidden="true">&nbsp;→</span>
            </a>
        </div>
    </section>

    <?php while (have_posts()) : the_post(); ?>
        <?php if (trim(get_the_content()) !== '') : ?>
            <section class="profile-details profile-editor-content">
                <div class="container narrow-content entry-content">
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
