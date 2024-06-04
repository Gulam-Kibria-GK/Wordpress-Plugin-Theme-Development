<!-- templates/shop-content-shop-info.php -->
<div id="shop-info-wrapper">
    <h1 id="shop-info-title">Shop Info</h1>
    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $shop_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");
    ?>
    <form id="shop-info-form" method="post">
        <div class="form-field" id="shop-name-field">
            <label for="shop_name">Shop Name:</label>
            <input type="text" id="shop_name" name="shop_name" value="<?php echo esc_attr($shop_info->shop_name); ?>" required>
        </div>
        <div class="form-field" id="shop-address-field">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo esc_textarea($shop_info->address); ?></textarea>
        </div>
        <div class="form-field" id="shop-country-field">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?php echo esc_attr($shop_info->country); ?>" required>
        </div>
        <div class="form-field" id="shop-phone-field">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo esc_attr($shop_info->phone); ?>" required>
        </div>
        <div class="form-field" id="shop-logo-field">
            <label for="logo_url">Logo URL:</label>
            <input type="url" id="logo_url" name="logo_url" value="<?php echo esc_url($shop_info->logo_url); ?>">
        </div>
        <div class="form-actions" id="shop-info-actions">
            <button type="submit" name="save_shop_info" id="save-shop-info-button">Save</button>
        </div>
    </form>
</div>