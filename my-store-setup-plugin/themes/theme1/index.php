<?php
get_header();
$store_info = get_my_store_info();
?>

<main class="bg-white mb-8">
    <div class="max-w-7xl mx-auto px-4 mt-10 2xl:px-0">
        <div class="max-w-7xl mx-auto md:mx-0 flex flex-col md:flex-row md:gap-8 mt-12">
            <div class="w-40 h-36 rounded-lg bg-gray-200 flex items-center justify-center ">
                <?php if ($store_info && $store_info->logo_url) : ?>
                    <img src="<?php echo esc_url($store_info->logo_url); ?>" alt="Logo" class="w-24 h-24 rounded-full border-black border-2">
                <?php endif; ?>
            </div>
            <div>
                <p class="text-xl text-gray-500 mt-4 md:mt-0"><?php echo esc_html($store_info->address); ?></p>
                <h2 class="text-3xl font-semibold mt-4 md:mt-4"><?php echo esc_html($store_info->shop_name); ?></h2>
                <p class="text-xl text-gray-500 mt-2 md:mt-1"><?php echo esc_html($store_info->country); ?></p>
                <p class="text-xl text-gray-500 mt-2 md:mt-1"><?php echo esc_html($store_info->phone); ?></p>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-10">
        <div class="mb-4 sticky top-0 bg-white shadow-md shadow-gray-300 border-t z-10">
            <ul class="max-w-7xl mx-auto flex flex-wrap px-4 2xl:px-0" role="tablist" id="myTabs">
                <!-- <div class="relative flex items-center pr-10">
                    <input type="text" id="search" class="block p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search in menu...">
                </div> -->
                <li role="presentation" class="pr-6">
                    <button class="font-medium py-4 text-black tab-button active" data-tabs-target="#menu">Menu</button>
                </li>
                <li role="presentation" class="pr-6">
                    <button class="font-medium py-4 text-black tab-button underline-custom" data-tabs-target="#about">About</button>
                </li>
                <li role="presentation" class="pr-6">
                    <button class="font-medium py-4 text-black tab-button underline-custom" data-tabs-target="#direction">Direction</button>
                </li>
            </ul>
        </div>

        <div id="myTabsContent" class="max-w-7xl mx-auto px-4 2xl:px-0">
            <div class="tab-content grid grid-cols-3 gap-8" id="menu" role="tabpanel">
                <div class="col-span-3 md:col-span-2">
                    <p class="text-gray-600 mt-8">No Menu available for this restaurant.</p>
                </div>
            </div>

            <div class="tab-content hidden" id="direction" role="tabpanel">
                <p class="text-gray-600 mt-8">No Direction available for this restaurant.</p>
            </div>

            <div class="tab-content hidden" id="about" role="tabpanel">
                <ul class="social-media-icons">
                    <?php if ($store_info->facebook) { ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->facebook); ?>">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($store_info->twitter) { ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->twitter); ?>">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($store_info->instagram) { ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->instagram); ?>">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>


        </div>
    </div>
</main>

<?php get_footer(); ?>