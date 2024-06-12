<!-- templates/shop-editor.php -->
<div id="shop-editor" class=" min-h-screen max-w-4xl mx-auto  p-6 ">
    <div class="bg-white shadow-md rounded p-6 mb-6">
        <form id="shop-settings-form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="save_shop_settings" value="1">

            <!-- Profile Section -->
            <div id="profile-section" class="mb-6">
                <div class="flex items-center mb-4">
                    <?php if ($shop_info['logo']) : ?>
                        <img src="<?php echo esc_url($shop_info['logo']); ?>" alt="Profile Image" class="w-24 h-24 rounded-full mr-4">
                    <?php endif; ?>
                    <div>
                        <input type="file" name="shop_logo" class="mb-2">
                    </div>
                </div>

                <!-- Cover Image Section -->
                <div class="flex items-center mb-4">
                    <?php if ($shop_info['cover']) : ?>
                        <img src="<?php echo esc_url($shop_info['cover']); ?>" alt="Cover Image" class="w-24 h-24 rounded-full mr-4">
                    <?php endif; ?>
                    <div>
                        <input type="file" name="shop_cover" class="mb-2">
                    </div>
                </div>
            </div>

            <!-- Font Section -->
            <div id="font-section" class="mb-6">
                <h2 class="text-xl font-bold mb-4">Font</h2>
                <div class="flex gap-4">
                    <label>
                        <input type="radio" name="shop_font" value="Sans-serif" <?php checked($shop_info['font'], 'Sans-serif'); ?>> Sans-serif
                    </label>
                    <label>
                        <input type="radio" name="shop_font" value="Serif" <?php checked($shop_info['font'], 'Serif'); ?>> Serif
                    </label>
                    <label>
                        <input type="radio" name="shop_font" value="Mono" <?php checked($shop_info['font'], 'Mono'); ?>> Mono
                    </label>
                </div>
            </div>

            <!-- Layout Section -->
            <div id="layout-section" class="mb-6">
                <h2 class="text-xl font-bold mb-4">Layouts</h2>
                <div class="flex gap-4">
                    <label>
                        <input type="radio" name="shop_layout" value="List" <?php checked($shop_info['layout'], 'List'); ?>> List
                    </label>
                    <label>
                        <input type="radio" name="shop_layout" value="Grid(1x2)" <?php checked($shop_info['layout'], 'Grid(1x2)'); ?>> Grid(1x2)
                    </label>
                    <label></label>
                    <input type="radio" name="shop_layout" value="Grid(1x4)" <?php checked($shop_info['layout'], 'Grid(1x4)'); ?>> Grid(1x4)
                    </label>
                </div>
            </div>

            <!-- Theme Section -->
            <div id="theme-section" class="mb-6">
                <h2 class="text-xl font-bold mb-4">Theme</h2>
                <div class="grid grid-cols-4 gap-4">
                    <!-- Theme 1 -->
                    <div class="bg-white shadow rounded p-4 grid grid-rows-2">
                        <img src="<?php echo plugin_dir_url(__DIR__) . 'themes/theme1/screenshot.png'; ?>" alt="Theme 1" class="mb-4" style="width: 120px; height: 100px;">

                        <div class=" grid grid-cols-2 gap-4 items-center">
                            <span>Theme 1</span>
                            <div>
                                <label>
                                    <input type="radio" name="theme_selection" value="theme1" <?php checked($shop_info['theme'], 'theme1'); ?>> Activate
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Theme 2 -->
                    <div class="bg-white shadow rounded p-4 grid grid-rows-2">
                        <div>
                            <img src=" <?php echo plugin_dir_url(__DIR__) . 'themes/theme2/screenshot.png'; ?>" alt="Theme 2" class="mb-4" style="width: 120px; height: 100px;">
                        </div>
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span>Theme 2</span>
                            <div>
                                <label>
                                    <input type="radio" name="theme_selection" value="theme2" <?php checked($shop_info['theme'], 'theme2'); ?>> Activate
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- theme 3 -->
                    <div class="bg-white shadow rounded p-4 grid grid-rows-2">
                        <img src="<?php echo plugin_dir_url(__DIR__) . 'themes/theme3/screenshot.png'; ?>" alt="Theme 2" class="mb-4" style="width: 120px; height: 100px;">
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span>Theme 3</span>
                            <div>
                                <label>
                                    <input type="radio" name="theme_selection" value="theme3" <?php checked($shop_info['theme'], 'theme3'); ?>> Activate
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- theme 4 -->
                    <div class="bg-white shadow rounded p-4 grid grid-rows-2">
                        <img src="<?php echo plugin_dir_url(__DIR__) . 'themes/theme4/screenshot.png'; ?>" alt="Theme 2" class="mb-4" style="width: 120px; height: 100px;">
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span>Theme 4</span>
                            <div>
                                <label>
                                    <input type="radio" name="theme_selection" value="theme4" <?php checked($shop_info['theme'], 'theme4'); ?>> Activate
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Settings</button>
        </form>
    </div>
</div>