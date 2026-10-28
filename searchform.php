<?php
$dani_custom_search_id = wp_unique_id('search-form-');
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="<?php echo esc_attr($dani_custom_search_id); ?>">
        <?php esc_html_e('Cari:', 'dani-custom'); ?>
    </label>
    <input
        type="search"
        id="<?php echo esc_attr($dani_custom_search_id); ?>"
        class="search-field"
        placeholder="<?php echo esc_attr_x('Cari tulisan…', 'placeholder', 'dani-custom'); ?>"
        value="<?php echo get_search_query(); ?>"
        name="s"
    >
    <button class="search-submit" type="submit">
        <span><?php esc_html_e('Cari', 'dani-custom'); ?></span>
    </button>
</form>
