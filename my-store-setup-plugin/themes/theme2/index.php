<?php
get_header();
$store_info = get_my_store_info();
$categories = get_my_store_categories();


// echo for debugging
// echo '<pre>';
// foreach ($categories as $category) :
//     $products = get_my_store_products($category->id);
//     echo 'count: ' . count($products) . '<br>';
//     foreach ($products as $product) :
//         echo $product->product_name . ' - ' . $product->product_price . '<br>';
//     endforeach;
// endforeach;
// echo '</pre>';

?>

<main class="bg-white mb-8">
    <div class="max-w-7xl mx-auto px-4 mt-10 2xl:px-0">
        <div class="max-w-7xl mx-auto md:mx-0 flex flex-col md:flex-row md:gap-8 mt-12">
            <div class="w-40 h-36 rounded-lg bg-gray-200 flex items-center justify-center ">
                <?php if ($store_info && $store_info->logo) : ?>
                    <img src="<?php echo esc_url($store_info->logo); ?>" alt="Logo" class="w-24 h-24 rounded-full border-black border-2">
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
            <div class="tab-content grid grid-cols-3 gap-8" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                <div class="col-span-3 md:col-span-2">
                    <?php if (count($categories) > 0) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <div class="mt-10">
                                <?php $products = get_my_store_products($category->id); ?>
                                <?php if (count($products)) : ?>
                                    <h2 class="text-xl font-semibold mb-4"><?php echo esc_html($category->category_name); ?></h2>
                                    <?php if ($store_info->layout == "Grid(1x2)") : ?>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
                                            <?php foreach ($products as $item) : ?>
                                                <div class="flex justify-between items-center gap-x-2 mb-2 rounded-lg border border-1 shadow hover:shadow-gray-300 hover:scale-105 duration-300">
                                                    <div class="ml-3">
                                                        <p class="text-md font-semibold"><?php echo esc_html($item->product_name); ?></p>
                                                        <p class="text-gray-600 font-semibold"> BDT
                                                            <?php echo esc_html($item->product_price); ?>
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 py-2 pr-2">
                                                        <img src="<?php echo esc_url($item->product_image ? $item->product_image : 'https://bikri.io/assets/images/bikri_product_blank_image.png'); ?>" alt="<?php echo esc_attr($item->product_name); ?>" class="w-22 h-16 rounded-lg">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php elseif ($store_info->layout == "List") : ?>
                                        <div class="max-w-xs grid grid-cols-1 gap-y-4 gap-x-8">
                                            <?php foreach ($products as $item) : ?>
                                                <div class="flex justify-between items-center gap-x-2 mb-2 rounded-lg border border-1 shadow hover:shadow-gray-300 hover:scale-105 duration-300">
                                                    <div class="ml-3">
                                                        <p class="text-md font-semibold"><?php echo esc_html($item->product_name); ?></p>
                                                        <p class="text-gray-600 font-semibold"> BDT
                                                            <?php echo esc_html($item->product_price); ?>
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 py-2 pr-2">
                                                        <img src="<?php echo esc_url($item->product_image ? $item->product_image : 'https://bikri.io/assets/images/bikri_product_blank_image.png'); ?>" alt="<?php echo esc_attr($item->product_name); ?>" class="w-22 h-16 rounded-lg">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-y-4 gap-x-8">
                                            <?php foreach ($products as $item) : ?>
                                                <div class="flex justify-between items-center gap-x-2 mb-2 rounded-lg border border-1 shadow hover:shadow-gray-300 hover:scale-105 duration-300">
                                                    <div class="ml-3">
                                                        <p class="text-md font-semibold"><?php echo esc_html($item->product_name); ?></p>
                                                        <p class="text-gray-600 font-semibold"> BDT
                                                            <?php echo esc_html($item->product_price); ?>
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 py-2 pr-2">
                                                        <img src="<?php echo esc_url($item->product_image ? $item->product_image : 'https://bikri.io/assets/images/bikri_product_blank_image.png'); ?>" alt="<?php echo esc_attr($item->product_name); ?>" class="w-22 h-16 rounded-lg">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-gray-600 mt-8"><span>No Menu available for this store.</span></p>
                    <?php endif; ?>
                </div>
                <div class=" hidden md:block col-span-0 md:col-span-1 border border-2 self-start sticky top-20 min-h-screen z-0">
                    <div class="rounded-lg mt-10 flex justify-center">
                        <a href="https://{{ $restaurant->subdomain }}.bikri.io" target="_blank" class=" bg-gray-300 text-xl text-center font-semibold px-12 py-4 hover:bg-gray-900 hover:scale-105 hover:text-white duration-300">Order
                            Now</a>
                    </div>
                </div>
            </div>

            <div class="tab-content hidden" id="direction" role="tabpanel" aria-labelledby="direction-tab">
                <p class="text-gray-600 mt-8">No Direction available for this store.</p>
            </div>

            <div class="tab-content hidden" id="about" role="tabpanel" aria-labelledby="about-tab">

                <div class="mt-8 max-w-4xl">
                    <!-- description echo -->
                    <h2 class="text-2xl">Description :</h2>
                    <p class="text-xl mt-4 ">
                        <?php echo esc_html($store_info->description); ?>
                    </p>
                </div>
                <ul class="social-media-icons mt-16">
                    <?php if ($store_info->facebook) : ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->facebook); ?>">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($store_info->twitter) : ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->twitter); ?>">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($store_info->instagram) : ?>
                        <li class="text-2xl font-semibold mt-2">
                            <a href="<?php echo esc_url($store_info->instagram); ?>">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>


    </div>
</main>

<?php get_footer(); ?>