<!-- templates/home.php -->
<?php
global $wpdb;
$table_name = $wpdb->prefix . 'my_store_shop_info';
$shop_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");

$table_name1 = $wpdb->prefix . 'my_store_categories';
$categories = $wpdb->get_results("SELECT * FROM $table_name1");

$table_name2 = $wpdb->prefix . 'my_store_products';
$products = $wpdb->get_results("SELECT * FROM $table_name2");
?>

<div id="store-setup-wrap" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 id="store-setup-title" class="text-3xl font-bold text-center mb-4">Let's get you started 🚀</h1>
    <p id="store-setup-description" class="text-center text-gray-600 mb-6">Follow these steps to setup your store.</p>
    <div id="store-setup-progress-bar-wrap" class="mb-6">
        <div id="store-setup-progress-bar" class="w-full bg-gray-200 rounded">
            <div id="store-setup-progress" class="h-2 bg-blue-600 rounded" style="width: 100%;"></div>
        </div>
    </div>
    <div id="store-setup-card" class="bg-gray-50 p-6 border border-gray-200 rounded mb-6">
        <div id="store-setup-card-header" class="mb-4">
            <h2 id="store-setup-card-title" class="text-2xl font-semibold text-center mb-2">Setup your store</h2>
            <p id="store-setup-card-description" class="text-center text-gray-600">Quickly build a beautiful looking store using our System.</p>
        </div>
        <ul id="store-setup-steps" class="list-none text-center">
            <li class="store-setup-step py-2  border-2 text-lg" id="store-setup-step-1"> <a href="<?php echo esc_url(admin_url('admin.php?page=home')); ?>"> 1. Setup your store </a> </li>
            <li class="store-setup-step py-2  border-2 text-lg" id="store-setup-step-2"> <a href="<?php echo esc_url(admin_url('admin.php?page=shop-editor')); ?>"> 2. Modify the shop editor as needed </a> </li>
            <li class="store-setup-step py-2  border-2 text-lg" id="store-setup-step-3"> <a href="<?php echo esc_url(admin_url('admin.php?page=shop_info')); ?>"> 3. Update the shop Info </a> </li>
            <li class="store-setup-step py-2  border-2 text-lg" id="store-setup-step-4"> <a href="<?php echo esc_url(admin_url('admin.php?page=category')); ?>"> 4. Add your categories </a> </li>
            <li class="store-setup-step py-2  border-2 text-lg" id="store-setup-step-5"> <a href="<?php echo esc_url(admin_url('admin.php?page=product')); ?>"> 5. Add your products </a> </li>
        </ul>
    </div>

    <div class="store-setup-card-2 bg-gray-50 p-6 border border-gray-200 rounded">
        <div class="mb-4">
            <h2 class="store-setup-card-2-title text-2xl  mb-2">Welcome to <span class="font-bold"> <?php echo esc_attr($shop_info->shop_name); ?> </span> </h2>
            <p class=" text-gray-600">Details about the store.</p>
        </div>
        <div class="store-setup-card-2-content grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

            <div>
                <h2 class="text-xl font-semibold mb-2">Theme</h2>
                <div class=" border shadow-xl rounded-lg hover:shadow-2xl hover:scale-105 duration-300">
                    <div class="relative">
                        <img src="https://digitawebs.com/bikrifood/public/assets/images/cities/city-tile-Dhaka.jpg" class="w-full rounded-t-lg h-40 object-cover " alt="" />
                        <h3 class="text-center text-lg font-medium px-2 py-1 mt-2 bg-white">
                            <?php echo esc_attr($shop_info->theme); ?>
                        </h3>
                    </div>
                    <div class="flex h-[60px] text-black rounded-b-lg font-medium text-sm p-3 bg-[##BFBFBF]">
                        This theme is active for this store.
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-2">Layouts</h2>
                <div class=" border shadow-xl rounded-lg hover:shadow-2xl hover:scale-105 duration-300">
                    <div class="relative">
                        <img src="https://digitawebs.com/bikrifood/public/assets/images/cities/city-tile-Sylhet.jpg" class="w-full rounded-t-lg h-40 object-cover " alt="" />
                        <h3 class="text-center text-lg font-medium px-2 py-1 mt-2 bg-white">
                            <?php echo esc_attr($shop_info->layout); ?>
                        </h3>
                    </div>
                    <div class="flex h-[60px] text-black rounded-b-lg font-medium text-sm p-3 bg-[##BFBFBF]">
                        This layout is active for this store.
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-2">Total Categories</h2>
                <div class=" border shadow-xl rounded-lg hover:shadow-2xl hover:scale-105 duration-300">
                    <div class="relative">
                        <img src="https://digitawebs.com/bikrifood/public/assets/images/cities/city-tile-Dhaka.jpg" class="w-full rounded-t-lg h-40 object-cover " alt="" />
                        <h3 class="text-center text-lg font-medium px-2 py-1 mt-2 bg-white">Total :-
                            <!-- count number of categories -->

                            <?php echo esc_attr(count($categories)); ?>
                        </h3>
                    </div>
                    <div class="flex h-[60px] text-black rounded-b-lg font-medium text-sm p-3 bg-[##BFBFBF]">
                        Total number of categories in this store.
                    </div>
                </div>
            </div>


            <div>
                <h2 class="text-xl font-semibold mb-2">Total Products</h2>
                <div class=" border shadow-xl rounded-lg hover:shadow-2xl hover:scale-105 duration-300">
                    <div class="relative">
                        <img src="https://digitawebs.com/bikrifood/public/assets/images/cities/city-tile-Rajshahi.jpg" class="w-full rounded-t-lg h-40 object-cover " alt="" />
                        <h3 class="text-center text-lg font-medium px-2 py-1 mt-2 bg-white">Total :-
                            <?php echo esc_attr(count($products)); ?>
                        </h3>
                    </div>
                    <div class="flex h-[60px] text-black rounded-b-lg font-medium text-sm p-3 bg-[##BFBFBF]">
                        Total number of products in this store.
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>