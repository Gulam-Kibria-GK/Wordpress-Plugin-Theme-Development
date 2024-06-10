<!-- templates/step3.php -->
<div id="step3-form" class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <div class="form-field mb-4" id="field-theme-selection">
        <label for="theme_selection" class="block text-gray-700 mb-2">Choose a Theme:</label>
        <select id="theme_selection" name="theme_selection" required class="w-full border rounded px-2 py-1">
            <option value="theme1">Theme 1</option>
            <option value="theme2">Theme 2</option>
            <option value="theme3">Theme 3</option>
            <option value="theme4">Theme 4</option>
            <!-- Add more themes as needed -->
        </select>
    </div>
    <div id="step3-actions" class="form-actions mt-4 ">
        <button id="step3-prev" style="margin-right: 5px" type="button" class="prev-step bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
        <button id="step3-submit" type="submit" name="submit_setup" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Finish</button>
    </div>
</div>