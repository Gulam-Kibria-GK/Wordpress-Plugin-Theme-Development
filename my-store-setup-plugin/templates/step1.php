<!-- templates/step1.php -->
<div id="step1-form">
    <div class="form-field" id="field-shop-name">
        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" required>
    </div>
    <div class="form-field" id="field-shop-address">
        <label for="shop_address">Shop Address:</label>
        <input type="text" id="shop_address" name="shop_address" required>
    </div>
    <div class="form-field" id="field-shop-country">
        <label for="shop_country">Country:</label>
        <select id="shop_country" name="shop_country" required>
            <option value="">Select Country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <!-- Add more countries as needed -->
        </select>
    </div>
    <div class="form-field" id="field-shop-phone">
        <label for="shop_phone">Phone Number:</label>
        <input type="text" id="shop_phone" name="shop_phone" required>
    </div>
    <div class="form-field" id="field-shop-logo">
        <label for="shop_logo">Logo URL:</label>
        <input type="url" id="shop_logo" name="shop_logo">
    </div>
    <div id="step1-actions" class="form-actions">
        <button id="step1-next" type="button" class="next-step">Next</button>
    </div>
</div>