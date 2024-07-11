<!-- templates/step1.php -->
<div id="step1-form" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <div class="form-field mb-4" id="field-shop-name">
        <label for="shop_name" class="block text-gray-700 mb-2">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" required class="w-full border rounded px-2 py-1">
    </div>
    <div class="form-field mb-4" id="field-shop-address">
        <label for="shop_address" class="block text-gray-700 mb-2">Shop Address:</label>
        <input type="text" id="shop_address" name="shop_address" required class="w-full border rounded px-2 py-1">
    </div>
    <div class="form-field mb-4" id="field-shop-country">
        <label for="shop_country" class="block text-gray-700 mb-2">Country:</label>
        <select id="shop_country" name="shop_country" required class="w-full border rounded px-2 py-1">
            <option value="">Select Country</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
            <option value="IT">Italy</option>
            <option value="ES">Spain</option>
            <option value="RU">Russia</option>
            <option value="BD">Bangladesh</option>
            <option value="US">United States</option>
            <option value="GB">United Kingdom</option>
            <option value="AU">Australia</option>
            <option value="NZ">New Zealand</option>
            <option value="IN">India</option>
            <option value="CA">Canada</option>
            <!-- Add more countries as needed -->
        </select>
    </div>
    <div class="form-field mb-4" id="field-shop-phone">
        <label for="shop_phone" class="block text-gray-700 mb-2">Phone Number:</label>
        <input type="text" id="shop_phone" name="shop_phone" class="w-full border rounded px-2 py-1">
    </div>
    <div class="form-field mb-4" id="field-shop-logo">
        <label for="shop_logo" class="block text-gray-700 mb-2">Logo</label>
        <input type="file" id="shop_logo" name="shop_logo" class="w-full border rounded px-2 py-1">
    </div>
    <div id="step1-actions" class="form-actions mt-4">
        <button id="step1-next" type="button" class="next-step bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
    </div>
</div>