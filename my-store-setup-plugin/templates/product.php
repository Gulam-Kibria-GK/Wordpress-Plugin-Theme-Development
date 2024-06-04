<!-- templates/product.php -->
<div id="product-form-wrapper">
    <h1 id="product-form-title">Add New Product</h1>
    <form id="product-form" method="post" enctype="multipart/form-data">
        <div class="form-field">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>
        <div class="form-field">
            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" step="0.01" required>
        </div>
        <div class="form-field">
            <label for="discount_price">Discount Price:</label>
            <input type="number" id="discount_price" name="discount_price" step="0.01">
        </div>
        <div class="form-field">
            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image">
        </div>
        <div class="form-field">
            <label for="product_category">Product Category:</label>
            <select id="product_category" name="product_category">
                <!-- Categories will be dynamically loaded here -->
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" name="save_product">Save Product</button>
        </div>
    </form>
</div>