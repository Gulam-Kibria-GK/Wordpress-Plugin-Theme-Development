<?php
function restaurant_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'restaurant_theme_setup');

function restaurant_theme_enqueue_scripts()
{
    wp_enqueue_style('restaurant-style', get_stylesheet_uri());
    wp_enqueue_script('restaurant-script', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    wp_enqueue_script('tailwindjs', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'restaurant_theme_enqueue_scripts');

function get_my_store_info()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $store_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");
    return $store_info;
}

function get_my_store_categories()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_categories';
    $categories = $wpdb->get_results("SELECT * FROM $table_name");
    return $categories;
}

function get_my_store_products($category_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_products';
    $products = $wpdb->get_results("SELECT * FROM $table_name WHERE product_category = $category_id");
    return $products;
}

function get_store_font_family()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'the-store';
    $font_family = $wpdb->get_var("SELECT font_family FROM $table_name LIMIT 1");
    return $font_family ? $font_family : '"Open Sans", sans-serif;'; // Fallback to a default font if not set
}

function add_dynamic_font_family_css()
{
    $font_family = get_store_font_family();
?>
    <style type="text/css">
        body {
            font-family: <?php echo esc_html($font_family); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'add_dynamic_font_family_css');
