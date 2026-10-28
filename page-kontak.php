<?php get_header(); ?>

<main id="primary" class="contact-page">
    <section class="contact-hero">
        <div class="container">
            <p class="eyebrow">Mari terhubung</p>
            <h1>Punya pertanyaan atau ingin <span>menyapa?</span></h1>
            <p class="contact-intro">
                Hubungi saya lewat kanal yang paling nyaman untuk Anda. Saya akan senang mendengar kabar Anda.
            </p>

            <div class="contact-grid">
                <a class="contact-card" href="https://instagram.com/achmadnx" target="_blank" rel="noopener noreferrer">
                    <span class="contact-icon" aria-hidden="true">ig</span>
                    <span class="contact-detail">
                        <small>Instagram</small>
                        <strong>@achmadnx</strong>
                    </span>
                    <span class="contact-arrow" aria-hidden="true">↗</span>
                </a>

                <a class="contact-card" href="https://wa.me/6285755791757" target="_blank" rel="noopener noreferrer">
                    <span class="contact-icon contact-icon-whatsapp" aria-hidden="true">wa</span>
                    <span class="contact-detail">
                        <small>WhatsApp</small>
                        <strong>085755791757</strong>
                    </span>
                    <span class="contact-arrow" aria-hidden="true">↗</span>
                </a>

                <a class="contact-card" href="https://tiktok.com/@w_dann1" target="_blank" rel="noopener noreferrer">
                    <span class="contact-icon contact-icon-tiktok" aria-hidden="true">♪</span>
                    <span class="contact-detail">
                        <small>TikTok</small>
                        <strong>@w_dann1</strong>
                    </span>
                    <span class="contact-arrow" aria-hidden="true">↗</span>
                </a>
            </div>

            <div class="contact-topics">
                <p class="eyebrow">Boleh menghubungi saya untuk</p>
                <ul>
                    <li>Bertukar ide dan pengalaman</li>
                    <li>Belajar bersama seputar desain atau coding</li>
                    <li>Diskusi dan kolaborasi karya digital</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-form-container container">
        <?php get_template_part('template-parts/contact', 'form'); ?>
    </section>

    <?php while (have_posts()) : the_post(); ?>
        <?php if (trim(get_the_content()) !== '') : ?>
            <section class="contact-page-content">
                <div class="container narrow-content entry-content">
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
