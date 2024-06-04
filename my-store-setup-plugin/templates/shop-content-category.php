<!-- templates/shop-content-category.php -->
<div id="category-wrapper">
    <h1 id="category-title">Category</h1>
    <nav id="category-nav">
        <ul>
            <li><a href="?page=category&action=add">Add</a></li>
            <li><a href="?page=category&action=list">List</a></li>
        </ul>
    </nav>

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : 'add';
    if ($action == 'add') {
    ?>
        <form id="category-form" method="post">
            <div class="form-field" id="category-name-field">
                <label for="category_name">Category Name:</label>
                <input type="text" id="category_name" name="category_name" required>
            </div>
            <div class="form-actions" id="category-actions">
                <button type="submit" name="add_category" id="add-category-button">Add Category</button>
            </div>
        </form>
    <?php
    } elseif ($action == 'list') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'my_store_categories';
        $categories = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
        <table id="category-list-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo esc_html($category->id); ?></td>
                        <td><?php echo esc_html($category->category_name); ?></td>
                        <td>
                            <!-- Add edit and delete functionality here -->
                            <a href="?page=category&action=edit&id=<?php echo esc_attr($category->id); ?>">Edit</a>
                            <a href="?page=category&action=delete&id=<?php echo esc_attr($category->id); ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>