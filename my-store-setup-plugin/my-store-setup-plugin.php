<?php

/**
 * Plugin Name: My Store Setup Plugin
 * Description: A plugin to create a store with a setup wizard.
 * Version: 1.0
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
        country varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        logo_url varchar(255) DEFAULT '' NOT NULL,
        facebook varchar(255) DEFAULT '' NOT NULL,
        twitter varchar(255) DEFAULT '' NOT NULL,
        instagram varchar(255) DEFAULT '' NOT NULL,
        theme varchar(255) NOT NULL,
        setup_complete tinyint(1) DEFAULT 0 NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Deactivation hook to delete tables
register_deactivation_hook(__FILE__, 'my_store_setup_delete_tables');
function my_store_setup_delete_tables()
{
    global $wpdb;

    // Table for storing shop information
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $sql = "DROP TABLE IF EXISTS $table_name;";

    $wpdb->query($sql);
}

// Enqueue admin styles and scripts
function my_store_setup_enqueue_admin_assets()
{
    // verstion update
    wp_enqueue_style('my-store-admin-styles', plugin_dir_url(__FILE__) . 'css/admin-styles.css', array(), '8.9', 'all');

    wp_enqueue_script('my-store-admin-scripts', plugin_dir_url(__FILE__) . 'js/admin-scripts.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'my_store_setup_enqueue_admin_assets');

// Add menu for setup wizard
function my_store_setup_add_admin_menu()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $setup_complete = $wpdb->get_var("SELECT setup_complete FROM $table_name WHERE id = 1"); // Adjust the condition as necessary
    add_menu_page('Store Setup', 'Store Setup', 'manage_options', 'my-store-setup', 'my_store_setup_render_admin_page', 'dashicons-store', 6);
    if ($setup_complete) {
        // Sub-menus shop editor 
        add_submenu_page("my-store-setup", "Shop Editor", "Shop Editor", "manage_options", "shop-editor", "my_store_setup_editor_page");
        // add_submenu_page('my-store-setup', 'Shop Content', 'Shop Content', 'manage_options', 'shop-content', 'my_store_setup_shop_content_page');
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
        <form id="my-store-setup-form" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
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

function my_store_setup_editor_page()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $shop_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1"); // Adjust the condition as necessary

    if (isset($_POST['update_shop'])) {
        $shop_name = sanitize_text_field($_POST['shop_name']);
        $address = sanitize_textarea_field($_POST['address']);
        $country = sanitize_text_field($_POST['country']);
        $phone = sanitize_text_field($_POST['phone']);
        $logo_url = esc_url_raw($_POST['logo_url']);
        $facebook = esc_url_raw($_POST['facebook']);
        $twitter = esc_url_raw($_POST['twitter']);
        $instagram = esc_url_raw($_POST['instagram']);
        $theme_selection = sanitize_text_field($_POST['theme_selection']);


        $wpdb->update(
            $table_name,
            array(
                'shop_name' => $shop_name,
                'address' => $address,
                'country' => $country,
                'phone' => $phone,
                'logo_url' => $logo_url,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'instagram' => $instagram,
                'theme' => $theme_selection
            ),
            array('id' => 1) // Adjust the condition as necessary
        );

        // Activate the selected theme
        switch_theme($theme_selection);

        echo '<div class="updated"><p>Shop information updated successfully.</p></div>';
    }

    // if ($_POST['delete_shop']) {
    //     $wpdb->delete($table_name, array('id' => 1)); // Adjust the condition as necessary
    //     echo '<div class="updated"><p>Shop information deleted successfully.</p></div>';
    // }
    include plugin_dir_path(__FILE__) . 'templates/shop-editor.php';
}

function my_store_setup_shop_content_page()
{
    echo "<h1>Shop Content Page</h1> ";
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
        $logo_url = esc_url_raw($_POST['shop_logo']);
        $facebook = esc_url_raw($_POST['facebook']);
        $twitter = esc_url_raw($_POST['twitter']);
        $instagram = esc_url_raw($_POST['instagram']);
        $theme = sanitize_text_field($_POST['theme_selection']);

        // Table name
        $table_name = $wpdb->prefix . 'my_store_shop_info';

        // Insert data into the table
        $wpdb->insert($table_name, array(
            'shop_name' => $shop_name,
            'address' => $address,
            'country' => $country,
            'phone' => $phone,
            'logo_url' => $logo_url,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'theme' => $theme,
            'setup_complete' => 1
        ));

        // Copy the selected theme to the WordPress themes directory
        copy_theme_to_wp_directory($theme);

        // Activate the copied theme
        switch_theme($theme);

        // Redirect to avoid form resubmission
        wp_redirect(admin_url('admin.php?page=my-store-setup&success=1'));
        exit;
    }
}
add_action('admin_post_my_store_setup', 'my_store_setup_handle_form_submission');
