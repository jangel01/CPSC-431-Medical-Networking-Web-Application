<?php include_once 'header.php'; ?>

<div class="container mt-5">

    <h2>Schedule Meeting</h2>

    <!-- form to schedule meeting, it consist of:
    - time (text)
    - practice (dropdown), if the practice doesn't exist the user can add it. There is a clickable text at the bottom of the dropdown that opens new form fields to add practice, it consist of:
        - practice name (text)
        - practice type (dropdown -- solo, group, or other)
        - practice speciality (text)
        - practice email address (email)
        - practice address (text)
        - practice phone (text)
    - Food preferences (dropdown -- Vegetarian, Vegan, Gluten-free, Lactose-free, Dairy-free, Seafood-free, Nut-free, Organic)
    - message (textarea)
    -->
    <form>
        <div class="mt-3 mb-3">
            <label for="time" class="form-label mb-2 fw-bold">Time</label>
            <input name="time" type="text" class="form-control" id="time">
        </div>
        <div class="mb-3">
            <label for="food1" class="form-label">Food preferences</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food1" value="Vegetarian" id="food1">
                <label class="form-check-label" for="food1">
                    Vegetarian
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food2" value="Vegan" id="food2">
                <label class="form-check-label" for="food2">
                    Vegan
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food3" value="Gluten-free" id="food3">
                <label class="form-check-label" for="food3">
                    Gluten-free
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food4" value="Dairy-free" id="food4">
                <label class="form-check-label" for="food4">
                    Dairy-free
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food5" value="Seafood-free" id="food5">
                <label class="form-check-label" for="food5">
                    Seafood-free
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food6" value="Nut-free" id="food6">
                <label class="form-check-label" for="food6">
                    Nut-free
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="food7" value="Organic" id="food7">
                <label class="form-check-label" for="food7">
                    Organic
                </label>
            </div>
        </div>
        <div class=" mt-3 mb-3">
            <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
            <select class="form-select" id="practice-name" name="practice-bane">
                <option value="empty">--</option>
                <option value="doctor">XYZ</option>
                <option value="office_manager">123</option>
                <option value="other">245</option>
            </select>
            <p>Don't see your practice? <u>Try adding it. </u></p>
        </div>
        <div class="mt-3 mb-4">
            <label for="message" class="fw-bold mb-1">Message </label>
            <textarea name="message" class="form-control" style="overflow:auto;" id="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>

<?php include_once 'footer.php'; ?>