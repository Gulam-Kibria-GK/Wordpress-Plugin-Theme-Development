<?php
//my-store-setup-plugin
/**
 * Plugin Name: My Store Setup Plugin
 * Description: A plugin to create a store with a setup wizard.
 * Version: 1.2
 * Author: Gulam Kibria
 */

// Deactivate other plugins upon activation
register_activation_hook(__FILE__, 'my_store_setup_deactivate_other_plugins');
function my_store_setup_deactivate_other_plugins()
{
    // Get all active plugins
    $active_plugins = get_option('active_plugins');

    // Deactivate each active plugin (except the current one)
    foreach ($active_plugins as $plugin) {
        if ($plugin != plugin_basename(__FILE__)) { // Exclude current plugin
            deactivate_plugins($plugin);
        }
    }
}


// Activation hook to create tables
register_activation_hook(__FILE__, 'my_store_setup_create_tables');
function my_store_setup_create_tables()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // Table for storing all information
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        shop_name varchar(255) NOT NULL,
        address text NOT NULL,
        description text NOT NULL,
        country varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        logo varchar(255) DEFAULT '' NOT NULL,
        cover varchar(255) DEFAULT '' NOT NULL,
        facebook varchar(255) DEFAULT '' NOT NULL,
        twitter varchar(255) DEFAULT '' NOT NULL,
        instagram varchar(255) DEFAULT '' NOT NULL,
        font varchar(255) DEFAULT 'Sans-serif' NOT NULL,
        layout varchar(255) DEFAULT 'List' NOT NULL,
        theme varchar(255) NOT NULL,
        setup_complete tinyint(1) DEFAULT 0 NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    // Categories Table
    $table_name3 = $wpdb->prefix . 'my_store_categories';
    $sql3 = "CREATE TABLE $table_name3 (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    category_name varchar(255) NOT NULL,
    PRIMARY KEY (id)
    ) $charset_collate;";


    // Table for storing products
    $table_name2 = $wpdb->prefix . 'my_store_products';
    $sql2 = "CREATE TABLE $table_name2 (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        product_name varchar(255) NOT NULL,
        product_price float NOT NULL,
        discount_price float DEFAULT 0,
        product_image varchar(255) DEFAULT '' NOT NULL,
        product_category mediumint(9) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (product_category) REFERENCES {$wpdb->prefix}my_store_categories(id) ON DELETE CASCADE

    ) $charset_collate;";




    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    dbDelta($sql3);
    dbDelta($sql2);
}

// Deactivation hook to delete tables
register_deactivation_hook(__FILE__, 'my_store_setup_delete_tables');
function my_store_setup_delete_tables()
{
    global $wpdb;

    // Table for storing shop information
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $sql1 = "DROP TABLE IF EXISTS $table_name;";


    // Table for storing products
    $table_name2 = $wpdb->prefix . 'my_store_products';
    $sql2 = "DROP TABLE IF EXISTS $table_name2;";


    // Categories Table
    $table_name3 = $wpdb->prefix . 'my_store_categories';
    $sql3 = "DROP TABLE IF EXISTS $table_name3;";


    $wpdb->query($sql1);
    $wpdb->query($sql2);
    $wpdb->query($sql3);
}

// Enqueue admin styles and scripts
function my_store_setup_enqueue_admin_assets()
{
    // verstion update
    wp_enqueue_style('tailwind', plugin_dir_url(__FILE__) . 'css/tailwind-output.css', array(), '1.0.1', 'all');

    wp_enqueue_style('my-store-admin-styles', plugin_dir_url(__FILE__) . 'css/admin-styles.css', array(), '8.9', 'all');

    wp_enqueue_script('my-store-admin-scripts', plugin_dir_url(__FILE__) . 'js/admin-scripts.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'my_store_setup_enqueue_admin_assets');

// for product page
add_action('admin_enqueue_scripts', 'my_store_setup_enqueue_styles');
function my_store_setup_enqueue_styles()
{
    wp_enqueue_style('product-styles', plugin_dir_url(__FILE__) . 'css/product-styles.css');
}
// Add menu for setup wizard
function my_store_setup_add_admin_menu()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $setup_complete = $wpdb->get_var("SELECT setup_complete FROM $table_name WHERE id = 1"); // Adjust the condition as necessary

    if (!$setup_complete) {
        add_menu_page('Store Setup', 'Store Setup', 'manage_options', 'my-store-setup', 'my_store_setup_render_admin_page', 'dashicons-store', 6);
    } else {
        add_menu_page("Home", "Home", 'manage_options', 'home', 'my_store_home_page', 'dashicons-menu', 6);

        // Add submenus under Shop Editor
        add_submenu_page('home', 'Shop Editor', 'Shop Editor', 'manage_options', 'shop-editor', 'my_store_setup_editor_page');
        add_submenu_page("home", "Shop Info", "Shop Info", 'manage_options', 'shop_info', 'shop_content_shop_info_page');
        add_submenu_page("home", "Category", "Category", 'manage_options', 'category', 'shop_content_category_page');
        add_submenu_page("home", "Product", "Product", 'manage_options', 'product', 'shop_content_product_page');
    }
}
add_action('admin_menu', 'my_store_setup_add_admin_menu');


// Render the setup wizard pages
function my_store_setup_render_admin_page()
{
?>
    <div class="wrap">
        <h1>Store Setup</h1>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1) : ?>
            <div class="notice notice-success is-dismissible">
                <p>Store setup completed successfully!</p>
            </div>
        <?php endif; ?>

        <form id="my-store-setup-form" method="post" action="<?php echo admin_url('admin-post.php'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="my_store_setup">
            <div id="step1" class="setup-step active">
                <?php include plugin_dir_path(__FILE__) . 'templates/step1.php'; ?>
            </div>
            <div id="step2" class="setup-step">
                <?php include plugin_dir_path(__FILE__) . 'templates/step2.php'; ?>
            </div>
            <div id="step3" class="setup-step">
                <?php include plugin_dir_path(__FILE__) . 'templates/step3.php'; ?>
            </div>
        </form>
    </div>
<?php
}

// my_store_setup_editor_page.php

function my_store_setup_editor_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';



    // Fetch current shop info
    $shop_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1", ARRAY_A);

    $previous_theme = $shop_info['theme'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_shop_settings'])) {
        // Handle cover photo upload
        if (isset($_FILES['shop_cover']) && !empty($_FILES['shop_cover']['name'])) {
            $cover_photo_url = handle_file_upload('shop_cover');
        } else {
            $cover_photo_url = $shop_info['cover'];
        }

        // Handle logo upload
        if (isset($_FILES['shop_logo']) && !empty($_FILES['shop_logo']['name'])) {
            $logo = handle_file_upload('shop_logo');
        } else {
            $logo = $shop_info['logo'];
        }

        // Save selected font, layout, and theme
        if (isset($_POST['shop_font'])) {
            $font = sanitize_text_field($_POST['shop_font']);
        } else {
            $font = $shop_info['font'];
        }
        if (isset($_POST['shop_layout'])) {
            $layout = sanitize_text_field($_POST['shop_layout']);
        } else {
            $layout = $shop_info['layout'];
        }
        if (isset($_POST['theme_selection'])) {
            $theme = sanitize_text_field($_POST['theme_selection']);
        } else {
            $theme = $shop_info['theme'];
        }

        // Update the database
        $wpdb->update(
            $table_name,
            array(
                'cover' => $cover_photo_url,
                'logo' => $logo,
                'font' => $font,
                'layout' => $layout,
                'theme' => $theme
            ),
            array('id' => 1)
        );

        if ($previous_theme != $theme) {
            copy_theme_to_wp_directory($theme);
            delete_previous_theme($previous_theme);
        }

        echo '<div class="updated"><p>Shop information updated successfully.</p></div>';
    }

    // Include the template
    include plugin_dir_path(__FILE__) . 'templates/shop-editor.php';
}

function handle_file_upload($file_input_name)
{
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }
    $uploadedfile = $_FILES[$file_input_name];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    if ($movefile && !isset($movefile['error'])) {
        return $movefile['url'];
    } else {
        return '';
    }
}



function my_store_home_page()
{
    include plugin_dir_path(__FILE__) . 'templates/home.php';
}


function shop_content_shop_info_page()
{
    global $wpdb;

    // Table name
    $table_name = $wpdb->prefix . 'my_store_shop_info';

    // Handle form submission
    if (isset($_POST['save_shop_info'])) {
        // Sanitize and collect form data
        $shop_name = sanitize_text_field($_POST['shop_name']);
        $address = sanitize_textarea_field($_POST['address']);
        $country = sanitize_text_field($_POST['country']);
        $phone = sanitize_text_field($_POST['phone']);
        $description = sanitize_textarea_field($_POST['description']);
        $facebook = esc_url_raw($_POST['facebook']);
        $twitter = esc_url_raw($_POST['twitter']);
        $instagram = esc_url_raw($_POST['instagram']);

        // Update data in the table
        $wpdb->update(
            $table_name,
            array(
                'shop_name' => $shop_name,
                'address' => $address,
                'country' => $country,
                'phone' => $phone,
                'description' => $description,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'instagram' => $instagram
            ),
            array('id' => 1) // Assuming the shop info ID is always 1
        );

        // Add a success message
        echo '<div class="notice notice-success is-dismissible"><p>Shop information updated successfully!</p></div>';
    }

    // Retrieve shop info from the database
    $shop_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");

    // Include the template file to display the form
    include plugin_dir_path(__FILE__) . 'templates/shop-content-shop-info.php';
}



function shop_content_product_page()
{

    if (isset($_POST['save_product'])) {
        // Handle form submission to save product details
        my_store_setup_handle_product_submission();
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_categories';

    $categories = $wpdb->get_results("SELECT * FROM $table_name");

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        global $wpdb;
        $product_id = intval($_GET['id']);
        $table_name = $wpdb->prefix . 'my_store_products';

        // Perform the delete operation
        $wpdb->delete($table_name, array('id' => $product_id));

        // Check for errors
        if ($wpdb->last_error) {
            wp_die('Database error: ' . $wpdb->last_error);
        }

        // Redirect back to the product list page after deletion
        wp_redirect(admin_url('admin.php?page=product&action=list'));
        exit;
    }



    // Include the product template
    include plugin_dir_path(__FILE__) . 'templates/product.php';
}

function shop_content_category_page()
{
    if (isset($_POST['add_category'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'my_store_categories';

        $category_name = sanitize_text_field($_POST['category_name']);

        $wpdb->insert(
            $table_name,
            ['category_name' => $category_name]
        );

        echo '<div class="notice notice-success is-dismissible"><p>Category added successfully!</p></div>';
    }

    include plugin_dir_path(__FILE__) . 'templates/shop-content-category.php';
}

function my_store_setup_handle_product_submission()
{
    if (isset($_POST['product_name'])) {
        global $wpdb;

        $product_name = sanitize_text_field($_POST['product_name']);
        $product_price = floatval($_POST['product_price']);
        $discount_price = floatval($_POST['discount_price']);
        $product_category = sanitize_text_field($_POST['product_category']);
        $product_image = handle_file_upload('product_image');

        $table_name = $wpdb->prefix . 'my_store_products';
        $wpdb->insert($table_name, array(
            'product_name' => $product_name,
            'product_price' => $product_price,
            'discount_price' => $discount_price,
            'product_image' => $product_image,
            'product_category' => $product_category
        ));
        // Redirect to avoid form resubmission
        wp_redirect(admin_url('admin.php?page=product&success=1'));
    }
}

// Delete previous theme
function delete_previous_theme($previous_theme)
{
    $theme_root = get_theme_root() . '/' . $previous_theme;

    if (is_dir($theme_root)) {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($theme_root, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }
        rmdir($theme_root);
    }
}

// Copy theme to WordPress directory
function copy_theme_to_wp_directory($theme_name)
{
    $source = plugin_dir_path(__FILE__) . 'themes/' . $theme_name;
    $destination = get_theme_root() . '/' . $theme_name;

    // Create the destination directory if it doesn't exist
    if (!file_exists($destination)) {
        mkdir($destination, 0755, true);
    }

    // Copy all files and directories from source to destination
    $dir = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
    $iterator = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $item) {
        $dest = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
        if ($item->isDir()) {
            mkdir($dest, 0755, true);
        } else {
            copy($item, $dest);
        }
    }

    switch_theme($theme_name);
}


// Handle form submission and save data
function my_store_setup_handle_form_submission()
{
    if (isset($_POST['action']) && $_POST['action'] == 'my_store_setup') {
        global $wpdb;

        // Sanitize and collect form data
        $shop_name = sanitize_text_field($_POST['shop_name']);
        $address = sanitize_textarea_field($_POST['shop_address']);
        $country = sanitize_text_field($_POST['shop_country']);
        $phone = sanitize_text_field($_POST['shop_phone']);
        $facebook = esc_url_raw($_POST['facebook']);
        $twitter = esc_url_raw($_POST['twitter']);
        $instagram = esc_url_raw($_POST['instagram']);
        $theme = sanitize_text_field($_POST['theme_selection']);

        $logo = '';
        if (isset($_FILES['shop_logo']) && !empty($_FILES['shop_logo']['name'])) {
            $logo = handle_file_upload('shop_logo');
        }

        // Table name
        $table_name = $wpdb->prefix . 'my_store_shop_info';

        // Insert data into the table
        $wpdb->insert($table_name, array(
            'shop_name' => $shop_name,
            'address' => $address,
            'country' => $country,
            'phone' => $phone,
            'logo' => $logo,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'theme' => $theme,
            'setup_complete' => 1
        ));

        // Copy the selected theme to the WordPress themes directory
        copy_theme_to_wp_directory($theme);


        // Redirect to avoid form resubmission
        wp_redirect(admin_url('admin.php?page=home&success=1'));
        exit;
    }
}
add_action('admin_post_my_store_setup', 'my_store_setup_handle_form_submission');
