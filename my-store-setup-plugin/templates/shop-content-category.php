<!-- templates/shop-content-category.php -->
<div id="category-wrapper" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 id="category-title" class="text-2xl font-bold mb-4">Category</h1>
    <nav id="category-nav" class="mb-4">
        <ul class="flex">
            <li class="mr-4"><a href="?page=category&action=add" class="text-blue-500 hover:text-blue-700">Add</a></li>
            <li><a href="?page=category&action=list" class="text-blue-500 hover:text-blue-700">List</a></li>
        </ul>
    </nav>

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : 'add';
    if ($action == 'add') {
    ?>
        <form id="category-form" method="post" class="mb-4">
            <div class="mb-4">
                <label for="category_name" class="block mb-2">Category Name:</label>
                <input type="text" id="category_name" name="category_name" required class="border rounded px-2 py-1">
            </div>
            <div class="flex">
                <button type="submit" name="add_category" id="add-category-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Category</button>
            </div>
        </form>
    <?php
    } elseif ($action == 'list') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'my_store_categories';
        $categories = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
        <table id="category-list-table" class="w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Category Name</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr class="odd:bg-gray-100">
                        <td class="border px-4 py-2"><?php echo esc_html($category->id); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($category->category_name); ?></td>
                        <td class="border px-4 py-2">
                            <!-- Add edit and delete functionality here -->
                            <a href="?page=category&action=edit&id=<?php echo esc_attr($category->id); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <a href="?page=category&action=delete&id=<?php echo esc_attr($category->id); ?>" class="text-red-500 hover:text-red-700">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>