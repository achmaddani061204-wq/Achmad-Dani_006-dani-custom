<?php

function dani_custom_setup() {
    load_theme_textdomain('dani-custom', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('style.css');

    register_nav_menus(array(
        'primary' => __('Menu Utama', 'dani-custom'),
        'footer'  => __('Menu Footer', 'dani-custom'),
    ));

    add_image_size('dani-custom-featured', 1200, 675, true);
}
add_action('after_setup_theme', 'dani_custom_setup');

function dani_custom_assets() {
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style('dani-style', get_stylesheet_uri(), array(), $theme_version);
    wp_enqueue_script(
        'dani-navigation',
        get_theme_file_uri('/assets/js/navigation.js'),
        array(),
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'dani_custom_assets');

function dani_custom_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'dani-custom'),
        'id'            => 'sidebar-1',
        'description'   => __('Widget ditampilkan di halaman artikel dan arsip.', 'dani-custom'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    for ($column = 1; $column <= 3; $column++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer %d', 'dani-custom'), $column),
            'id'            => 'footer-' . $column,
            'description'   => __('Widget ditampilkan di area footer.', 'dani-custom'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'dani_custom_widgets_init');

function dani_custom_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'dani_custom_excerpt_length');

function dani_custom_page_url($slug) {
    $permalink_structure = get_option('permalink_structure');

    if ($permalink_structure && strpos($permalink_structure, 'index.php') !== false) {
        return home_url('index.php/' . trim($slug, '/') . '/');
    }

    if ($permalink_structure) {
        return home_url('/' . trim($slug, '/') . '/');
    }

    $slug = sanitize_key($slug);

    return add_query_arg(
        array(
            'pagename'          => $slug,
            'dani_custom_page'  => $slug,
        ),
        home_url('/')
    );
}

function dani_custom_rewrite_rules() {
    add_rewrite_rule('^profil/?$', 'index.php?pagename=profil&dani_custom_page=profil', 'top');
    add_rewrite_rule('^kontak/?$', 'index.php?pagename=kontak&dani_custom_page=kontak', 'top');
    add_rewrite_rule('^index.php/profil/?$', 'index.php?pagename=profil&dani_custom_page=profil', 'top');
    add_rewrite_rule('^index.php/kontak/?$', 'index.php?pagename=kontak&dani_custom_page=kontak', 'top');
}
add_action('init', 'dani_custom_rewrite_rules');

function dani_custom_register_portfolio_content() {
    register_post_type('dani_project', array(
        'labels' => array(
            'name'               => __('Proyek', 'dani-custom'),
            'singular_name'      => __('Proyek', 'dani-custom'),
            'add_new_item'       => __('Tambah Proyek', 'dani-custom'),
            'edit_item'          => __('Edit Proyek', 'dani-custom'),
            'new_item'           => __('Proyek Baru', 'dani-custom'),
            'view_item'          => __('Lihat Proyek', 'dani-custom'),
            'search_items'       => __('Cari Proyek', 'dani-custom'),
            'not_found'          => __('Belum ada proyek.', 'dani-custom'),
            'not_found_in_trash' => __('Tidak ada proyek di sampah.', 'dani-custom'),
            'menu_name'          => __('Proyek', 'dani-custom'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'proyek'),
        'menu_icon'    => 'dashicons-portfolio',
        'show_in_rest' => true,
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
    ));

    register_post_type('dani_skill', array(
        'labels' => array(
            'name'               => __('Keahlian', 'dani-custom'),
            'singular_name'      => __('Keahlian', 'dani-custom'),
            'add_new_item'       => __('Tambah Keahlian', 'dani-custom'),
            'edit_item'          => __('Edit Keahlian', 'dani-custom'),
            'new_item'           => __('Keahlian Baru', 'dani-custom'),
            'search_items'       => __('Cari Keahlian', 'dani-custom'),
            'not_found'          => __('Belum ada keahlian.', 'dani-custom'),
            'menu_name'          => __('Keahlian', 'dani-custom'),
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-lightbulb',
        'supports'     => array('title', 'editor', 'page-attributes'),
    ));

    register_taxonomy('dani_project_type', array('dani_project'), array(
        'labels' => array(
            'name'          => __('Kategori Proyek', 'dani-custom'),
            'singular_name' => __('Kategori Proyek', 'dani-custom'),
            'add_new_item'  => __('Tambah Kategori Proyek', 'dani-custom'),
            'menu_name'     => __('Kategori Proyek', 'dani-custom'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'kategori-proyek'),
    ));
}
add_action('init', 'dani_custom_register_portfolio_content', 5);

function dani_custom_project_meta_box() {
    add_meta_box(
        'dani-custom-project-links',
        __('Tautan Proyek', 'dani-custom'),
        'dani_custom_render_project_meta_box',
        'dani_project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes_dani_project', 'dani_custom_project_meta_box');

function dani_custom_render_project_meta_box($post) {
    wp_nonce_field('dani_custom_save_project_links', 'dani_custom_project_nonce');
    $demo_url = get_post_meta($post->ID, '_dani_custom_project_demo_url', true);
    $source_url = get_post_meta($post->ID, '_dani_custom_project_source_url', true);
    ?>
    <p>
        <label for="dani-custom-project-demo"><?php esc_html_e('Tautan demo / hasil proyek', 'dani-custom'); ?></label><br>
        <input class="widefat" type="url" id="dani-custom-project-demo" name="dani_custom_project_demo_url" value="<?php echo esc_attr($demo_url); ?>" placeholder="https://">
    </p>
    <p>
        <label for="dani-custom-project-source"><?php esc_html_e('Tautan repositori / sumber (opsional)', 'dani-custom'); ?></label><br>
        <input class="widefat" type="url" id="dani-custom-project-source" name="dani_custom_project_source_url" value="<?php echo esc_attr($source_url); ?>" placeholder="https://">
    </p>
    <?php
}

function dani_custom_save_project_links($post_id) {
    if (
        !isset($_POST['dani_custom_project_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dani_custom_project_nonce'])), 'dani_custom_save_project_links')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    $fields = array(
        'dani_custom_project_demo_url'   => '_dani_custom_project_demo_url',
        'dani_custom_project_source_url' => '_dani_custom_project_source_url',
    );

    foreach ($fields as $field => $meta_key) {
        if (!isset($_POST[$field])) {
            delete_post_meta($post_id, $meta_key);
            continue;
        }

        if (!is_string($_POST[$field])) {
            continue;
        }

        $url = esc_url_raw(wp_unslash($_POST[$field]));

        if ($url !== '') {
            update_post_meta($post_id, $meta_key, $url);
        } else {
            delete_post_meta($post_id, $meta_key);
        }
    }
}
add_action('save_post_dani_project', 'dani_custom_save_project_links');

function dani_custom_contact_redirect($status) {
    $url = add_query_arg('contact_status', sanitize_key($status), dani_custom_page_url('kontak'));
    wp_safe_redirect($url . '#formulir-kontak');
    exit;
}

function dani_custom_handle_contact_form() {
    if (
        !isset($_POST['dani_custom_contact_nonce'])
        || !is_string($_POST['dani_custom_contact_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dani_custom_contact_nonce'])), 'dani_custom_contact')
    ) {
        wp_die(esc_html__('Formulir kedaluwarsa atau tidak valid. Kembali dan coba kirim ulang.', 'dani-custom'), '', array('response' => 403));
    }

    if (!empty($_POST['website'])) {
        dani_custom_contact_redirect('sent');
    }

    $raw_name = isset($_POST['contact_name']) && is_string($_POST['contact_name']) ? wp_unslash($_POST['contact_name']) : '';
    $raw_email = isset($_POST['contact_email']) && is_string($_POST['contact_email']) ? wp_unslash($_POST['contact_email']) : '';
    $raw_subject = isset($_POST['contact_subject']) && is_string($_POST['contact_subject']) ? wp_unslash($_POST['contact_subject']) : '';
    $raw_message = isset($_POST['contact_message']) && is_string($_POST['contact_message']) ? wp_unslash($_POST['contact_message']) : '';

    $name = sanitize_text_field($raw_name);
    $email = sanitize_email($raw_email);
    $subject = sanitize_text_field($raw_subject);
    $message = sanitize_textarea_field($raw_message);

    if (
        $name === ''
        || strlen($name) > 100
        || !is_email($email)
        || $subject === ''
        || strlen($subject) > 150
        || $message === ''
        || strlen($message) > 5000
    ) {
        dani_custom_contact_redirect('invalid');
    }

    $mail_subject = sprintf(__('Pesan portofolio dari %s: %s', 'dani-custom'), $name, $subject);
    $mail_body = sprintf(
        "%s\n\n%s\n\n%s: %s",
        $message,
        __('Pesan dikirim melalui formulir portofolio.', 'dani-custom'),
        __('Email pengirim', 'dani-custom'),
        $email
    );
    $headers = array('Reply-To: ' . $name . ' <' . $email . '>');

    if (!wp_mail(get_option('admin_email'), $mail_subject, $mail_body, $headers)) {
        dani_custom_contact_redirect('error');
    }

    dani_custom_contact_redirect('sent');
}
add_action('admin_post_dani_custom_contact', 'dani_custom_handle_contact_form');
add_action('admin_post_nopriv_dani_custom_contact', 'dani_custom_handle_contact_form');

function dani_custom_query_vars($vars) {
    $vars[] = 'dani_custom_page';
    return $vars;
}
add_filter('query_vars', 'dani_custom_query_vars');

function dani_custom_page_template($template) {
    $page = get_query_var('dani_custom_page');

    if ($page === 'profil' || $page === 'kontak') {
        return get_theme_file_path('/page-' . $page . '.php');
    }

    return $template;
}
add_filter('template_include', 'dani_custom_page_template');

function dani_custom_handle_profile_404($preempt, $query) {
    $page = $query->get('dani_custom_page');

    if ($page === 'profil' || $page === 'kontak') {
        $query->is_404 = false;
        status_header(200);
        return true;
    }

    return $preempt;
}
add_filter('pre_handle_404', 'dani_custom_handle_profile_404', 10, 2);

function dani_custom_profile_document_title($title_parts) {
    $page = get_query_var('dani_custom_page');

    if ($page === 'profil') {
        $title_parts['title'] = __('Profil', 'dani-custom');
    } elseif ($page === 'kontak') {
        $title_parts['title'] = __('Kontak', 'dani-custom');
    }

    return $title_parts;
}
add_filter('document_title_parts', 'dani_custom_profile_document_title');

function dani_custom_profile_body_classes($classes) {
    $page = get_query_var('dani_custom_page');

    if ($page === 'profil' || $page === 'kontak') {
        $classes[] = 'page';
        $classes[] = 'dani-custom-' . $page;
    }

    return $classes;
}
add_filter('body_class', 'dani_custom_profile_body_classes');

function dani_custom_add_profile_menu_items($items, $args) {
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $items;
    }

    $menu_items = array(
        __('Tentang', 'dani-custom')  => home_url('/#tentang'),
        __('Keahlian', 'dani-custom') => home_url('/#keahlian'),
        __('Proyek', 'dani-custom')   => home_url('/#proyek'),
        __('Artikel', 'dani-custom')  => home_url('/#artikel'),
        __('Profil', 'dani-custom')   => dani_custom_page_url('profil'),
        __('Kontak', 'dani-custom')   => home_url('/#kontak'),
    );

    foreach ($menu_items as $label => $url) {
        $escaped_url = esc_url($url);

        if (strpos($items, 'href="' . $escaped_url . '"') === false) {
            $items .= '<li class="menu-item"><a href="' . $escaped_url . '">' . esc_html($label) . '</a></li>';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'dani_custom_add_profile_menu_items', 10, 2);

function dani_custom_menu_fallback() {
    $home_url = esc_url(home_url('/'));
    $profile_url = esc_url(dani_custom_page_url('profil'));

    return '<ul id="primary-menu" class="menu"><li class="menu-item"><a href="' . $home_url . '">' . esc_html__('Beranda', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . esc_url(home_url('/#tentang')) . '">' . esc_html__('Tentang', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . esc_url(home_url('/#keahlian')) . '">' . esc_html__('Keahlian', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . esc_url(home_url('/#proyek')) . '">' . esc_html__('Proyek', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . esc_url(home_url('/#artikel')) . '">' . esc_html__('Artikel', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . $profile_url . '">' . esc_html__('Profil', 'dani-custom') . '</a></li>'
        . '<li class="menu-item"><a href="' . esc_url(home_url('/#kontak')) . '">' . esc_html__('Kontak', 'dani-custom') . '</a></li></ul>';
}

function dani_custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'dani_custom_flush_rewrite_rules');

function dani_custom_maybe_flush_rewrite_rules() {
    $rewrite_version = '1.3';

    if (get_option('dani_custom_rewrite_version') !== $rewrite_version) {
        flush_rewrite_rules(false);
        update_option('dani_custom_rewrite_version', $rewrite_version);
    }
}
add_action('init', 'dani_custom_maybe_flush_rewrite_rules', 99);
