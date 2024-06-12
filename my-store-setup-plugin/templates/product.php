<!-- templates/product.php -->
<div id="product-form-wrapper" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 id="product-title" class="text-2xl font-bold mb-4">Product</h1>
    <nav id="product-nav" class="mb-4">
        <ul class="flex">
            <li style="margin-right: 6px"><a href="?page=product&action=add" class="text-blue-500 hover:text-blue-700">Add</a></li>
            <li><a href="?page=product&action=list" class="text-blue-500 hover:text-blue-700">List</a></li>
        </ul>
    </nav>

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : 'add';
    if ($action == 'add') {
    ?>
        <div id="product-form-wrapper" class="p-4 bg-white shadow rounded">
            <h1 id="product-form-title" class="text-xl font-bold mb-4">Add New Product</h1>
            <form id="product-form" method="post" enctype="multipart/form-data">
                <div class="form-field mb-4">
                    <label for="product_name" class="block text-gray-700 mb-2">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required class="w-full border rounded px-2 py-1">
                </div>
                <div class="form-field mb-4">
                    <label for="product_price" class="block text-gray-700 mb-2">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" step="0.01" required class="w-full border rounded px-2 py-1">
                </div>
                <div class="form-field mb-4">
                    <label for="discount_price" class="block text-gray-700 mb-2">Discount Price:</label>
                    <input type="number" id="discount_price" name="discount_price" step="0.01" class="w-full border rounded px-2 py-1">
                </div>
                <div class="form-field mb-4">
                    <label for="product_image" class="block text-gray-700 mb-2">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" class="w-full">
                </div>
                <div class="form-field mb-4">
                    <label for="product_category" class="block text-gray-700 mb-2">Product Category:</label>
                    <select id="product_category" name="product_category" required class="w-full border rounded px-2 py-1">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo esc_attr($category->id); ?>"><?php echo esc_html($category->category_name); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" name="save_product" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Product</button>
                </div>
            </form>
        </div>
    <?php
    } elseif ($action == 'list') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'my_store_products';
        $products = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
        <table id="product-list-table" class="w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Product Name</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Discount Price</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr class="odd:bg-gray-100">
                        <td class="border px-4 py-2"><?php echo esc_html($product->id); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($product->product_name); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($product->product_price); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($product->discount_price); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($product->product_category); ?></td>
                        <td class="border px-4 py-2">
                            <a href="?page=product&action=edit&id=<?php echo esc_attr($product->id); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <a href="?page=product&action=delete&id=<?php echo esc_attr($product->id); ?>" class="text-red-500 hover:text-red-700">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>