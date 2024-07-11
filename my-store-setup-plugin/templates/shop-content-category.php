<!-- templates/shop-content-category.php -->
<div id="category-wrapper" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 id="category-title" class="text-2xl font-bold mb-4">Category</h1>
    <nav id="category-nav" class="mb-4">
        <ul class="flex">
            <li class="mr-4">
                <a href="?page=category&action=add" style="color: #ffffff; background-color: #999999; border: 2px solid #999999; font-size: 1.25rem; padding: 5px 15px; border-radius: 4px; text-decoration: none; transition: all 0.3s ease-in-out;">Add</a>
            </li>
            <li>
                <a href="?page=category&action=list" style="color: #ffffff; background-color: #999999; border: 2px solid #999999; font-size: 1.25rem; padding: 5px 15px; border-radius: 4px; text-decoration: none; transition: all 0.3s ease-in-out;">List</a>
            </li>
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
                    <!-- <th class="border px-4 py-2">Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr class="odd:bg-gray-100">
                        <td class="border px-4 py-2"><?php echo esc_html($category->id); ?></td>
                        <td class="border px-4 py-2"><?php echo esc_html($category->category_name); ?></td>
                        <!-- <td class="border px-4 py-2">
                            Add edit and delete functionality here
                            <a href="?page=category&action=edit&id=<?php echo esc_attr($category->id); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <a href="?page=category&action=delete&id=<?php echo esc_attr($category->id); ?>" class="text-red-500 hover:text-red-700">Delete</a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>

<script>
    // JavaScript code to detect active link and change background color
    const currentPage = window.location.href;
    const addLink = document.querySelector('a[href="?page=category&action=add"]');
    const listLink = document.querySelector('a[href="?page=category&action=list"]');

    addLink.style.backgroundColor = '#2563eb';
    addLink.style.borderColor = '#2563eb';

    if (currentPage.includes("action=add")) {
        addLink.style.backgroundColor = "#3b82f6";
        addLink.style.borderColor = "#3b82f6";
        listLink.style.backgroundColor = "#999999";
        listLink.style.borderColor = "#999999";
    } else if (currentPage.includes("action=list")) {
        listLink.style.backgroundColor = "#3b82f6";
        listLink.style.borderColor = "#3b82f6";
        addLink.style.backgroundColor = '#999999';
        addLink.style.borderColor = '#999999';
    }
</script>