<!-- templates/shop-editor.php -->
<div id="shop-editor-wrap">
    <h1 id="shop-editor-title">Shop Editor</h1>
    <form id="shop-editor-form" method="post" action="">
        <input type="hidden" name="update_shop" value="1">
        <table id="shop-editor-table">
            <tr id="shop-name-row">
                <th><label for="shop_name">Shop Name</label></th>
                <td><input name="shop_name" type="text" id="shop_name" value="<?php echo esc_attr($shop_info->shop_name); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-address-row">
                <th><label for="address">Address</label></th>
                <td><textarea name="address" id="address" rows="5" class="large-text"><?php echo esc_textarea($shop_info->address); ?></textarea></td>
            </tr>
            <tr id="shop-country-row">
                <th><label for="country">Country</label></th>
                <td><input name="country" type="text" id="country" value="<?php echo esc_attr($shop_info->country); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-phone-row">
                <th><label for="phone">Phone</label></th>
                <td><input name="phone" type="text" id="phone" value="<?php echo esc_attr($shop_info->phone); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-logo-row">
                <th><label for="logo_url">Logo URL</label></th>
                <td><input name="logo_url" type="text" id="logo_url" value="<?php echo esc_attr($shop_info->logo_url); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-facebook-row">
                <th><label for="facebook">Facebook</label></th>
                <td><input name="facebook" type="text" id="facebook" value="<?php echo esc_attr($shop_info->facebook); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-twitter-row">
                <th><label for="twitter">Twitter</label></th>
                <td><input name="twitter" type="text" id="twitter" value="<?php echo esc_attr($shop_info->twitter); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-instagram-row">
                <th><label for="instagram">Instagram</label></th>
                <td><input name="instagram" type="text" id="instagram" value="<?php echo esc_attr($shop_info->instagram); ?>" class="regular-text"></td>
            </tr>
            <tr id="shop-theme-row">
                <th><label for="theme_selection">Choose a Theme</label></th>
                <td>
                    <select name="theme_selection" id="theme_selection">
                        <option value="theme1" <?php selected($shop_info->theme, 'theme1'); ?>>Theme 1</option>
                        <option value="theme2" <?php selected($shop_info->theme, 'theme2'); ?>>Theme 2</option>
                        <option value="theme3" <?php selected($shop_info->theme, 'theme3'); ?>>Theme 3</option>
                        <option value="theme4" <?php selected($shop_info->theme, 'theme4'); ?>>Theme 4</option>
                        <!-- Add more themes as needed -->
                    </select>
                </td>
            </tr>
        </table>
        <p id="shop-editor-actions">
            <input type="submit" name="update_shop1" id="submit" class="button button-primary" value="Save Changes">
            <!-- <input type="submit" name="delete_shop" id="delete" class="button button-secondary" value="Delete Store"> -->
        </p>
    </form>
</div>