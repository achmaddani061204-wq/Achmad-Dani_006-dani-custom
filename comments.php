<?php
if (post_password_required()) {
    return;
}
?>

<section id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                esc_html(_n('%s tanggapan', '%s tanggapan', get_comments_number(), 'dani-custom')),
                esc_html(number_format_i18n(get_comments_number()))
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
            ));
            ?>
        </ol>

        <?php the_comments_pagination(array(
            'prev_text' => __('&larr; Komentar sebelumnya', 'dani-custom'),
            'next_text' => __('Komentar berikutnya &rarr;', 'dani-custom'),
        )); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php esc_html_e('Komentar sudah ditutup.', 'dani-custom'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'          => __('Tinggalkan komentar', 'dani-custom'),
        'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h2>',
        'label_submit'         => __('Kirim komentar', 'dani-custom'),
        'class_submit'         => 'btn comment-submit',
        'comment_notes_before' => '<p class="comment-notes">' . esc_html__('Alamat email Anda tidak akan dipublikasikan. Kolom wajib ditandai *', 'dani-custom') . '</p>',
    ));
    ?>
</section>
