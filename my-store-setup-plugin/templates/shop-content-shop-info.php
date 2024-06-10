<!-- templates/shop-content-shop-info.php -->
<div id="shop-info-wrapper" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 id="shop-info-title" class="text-2xl font-bold mb-4">Shop Info</h1>
    <form id="shop-info-form" method="post" action="">
        <div class="form-field mb-4" id="shop-name-field">
            <label for="shop_name" class="block text-gray-700 mb-2">Shop Name:</label>
            <input type="text" id="shop_name" name="shop_name" value="<?php echo esc_attr($shop_info->shop_name); ?>" required class="w-full border rounded px-2 py-1">
        </div>
        <div class="form-field mb-4" id="shop-address-field">
            <label for="address" class="block text-gray-700 mb-2">Address:</label>
            <textarea id="address" name="address" required class="w-full border rounded px-2 py-1"><?php echo esc_textarea($shop_info->address); ?></textarea>
        </div>
        <div class="form-field mb-4" id="field-shop-country">
            <label for="country" class="block text-gray-700 mb-2">Country:</label>
            <select id="country" name="country" required class="w-full border rounded px-2 py-1">
                <option value="">Select Country</option>
                <option value="FR" <?php selected($shop_info->country, 'FR'); ?>>France</option>
                <option value="DE" <?php selected($shop_info->country, 'DE'); ?>>Germany</option>
                <option value="IT" <?php selected($shop_info->country, 'IT'); ?>>Italy</option>
                <option value="ES" <?php selected($shop_info->country, 'ES'); ?>>Spain</option>
                <option value="RU" <?php selected($shop_info->country, 'RU'); ?>>Russia</option>
                <option value="BD" <?php selected($shop_info->country, 'BD'); ?>>Bangladesh</option>
                <option value="US" <?php selected($shop_info->country, 'US'); ?>>United States</option>
                <option value="GB" <?php selected($shop_info->country, 'GB'); ?>>United Kingdom</option>
                <option value="AU" <?php selected($shop_info->country, 'AU'); ?>>Australia</option>
                <option value="NZ" <?php selected($shop_info->country, 'NZ'); ?>>New Zealand</option>
                <option value="IN" <?php selected($shop_info->country, 'IN'); ?>>India</option>
                <option value="CA" <?php selected($shop_info->country, 'CA'); ?>>Canada</option>
                <!-- Add more countries as needed -->
            </select>
        </div>
        <div class="form-field mb-4" id="shop-phone-field">
            <label for="phone" class="block text-gray-700 mb-2">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo esc_attr($shop_info->phone); ?>" required class="w-full border rounded px-2 py-1">
        </div>
        <div class="form-field mb-4" id="shop-description-field">
            <label for="description" class="block text-gray-700 mb-2">Description:</label>
            <textarea id="description" name="description" required class="w-full border rounded px-2 py-1"><?php echo esc_textarea($shop_info->description); ?></textarea>
        </div>
        <!-- Additional fields for social media -->
        <div class="form-field mb-4" id="shop-facebook-field">
            <label for="facebook" class="block text-gray-700 mb-2">Facebook:</label>
            <input name="facebook" type="text" id="facebook" value="<?php echo esc_attr($shop_info->facebook); ?>" class="w-full border rounded px-2 py-1">
        </div>
        <div class="form-field mb-4" id="shop-twitter-field">
            <label for="twitter" class="block text-gray-700 mb-2">Twitter:</label>
            <input type="text" id="twitter" name="twitter" value="<?php echo esc_attr($shop_info->twitter); ?>" class="w-full border rounded px-2 py-1">
        </div>
        <div class="form-field mb-4" id="shop-instagram-field">
            <label for="instagram" class="block text-gray-700 mb-2">Instagram:</label>
            <input type="text" id="instagram" name="instagram" value="<?php echo esc_attr($shop_info->instagram); ?>" class="w-full border rounded px-2 py-1">
        </div>

        <div class="form-actions mt-4" id="shop-info-actions">
            <button type="submit" name="save_shop_info" id="save-shop-info-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </div>
    </form>
</div>