<?php
// themes/theme1/index.php

get_header(); ?>

<div id="store-info">
    <?php
    $store_info = get_my_store_info();
    if ($store_info) {
    ?>
        <div id="store-name">
            <h1><?php echo esc_html($store_info->shop_name); ?></h1>
        </div>
        <div id="store-address">
            <p><?php echo esc_html($store_info->address); ?></p>
        </div>
        <div id="store-country">
            <p><?php echo esc_html($store_info->country); ?></p>
        </div>
        <div id="store-phone">
            <p><?php echo esc_html($store_info->phone); ?></p>
        </div>
        <div id="store-logo">
            <img src="<?php echo esc_url($store_info->logo_url); ?>" alt="Store Logo">
        </div>
        <div id="store-social-media">
            <ul>
                <?php if ($store_info->facebook) { ?>
                    <li><a href="<?php echo esc_url($store_info->facebook); ?>">Facebook</a></li>
                <?php } ?>
                <?php if ($store_info->twitter) { ?>
                    <li><a href="<?php echo esc_url($store_info->twitter); ?>">Twitter</a></li>
                <?php } ?>
                <?php if ($store_info->instagram) { ?>
                    <li><a href="<?php echo esc_url($store_info->instagram); ?>">Instagram</a></li>
                <?php } ?>
            </ul>
        </div>
    <?php
    } else {
        echo '<p>No store information found.</p>';
    }
    ?>
</div>

<?php
get_footer();
