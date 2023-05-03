<?php include_once 'header.php'; ?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<div class="container mt-5">

    <h2>Schedule Meeting</h2>


    <form>
        <!-- Meeting form -- form to schedule meeting, it consists of:
            - time (text)
            - practice (dropdown), if the practice doesn't exist the user can add it. There is a clickable text at the bottom of the dropdown that opens new form fields to add a new practice to the selection if it doesn't exist already.
            - Food preferences (dropdown -- Vegetarian, Vegan, Gluten-free, Lactose-free, Dairy-free, Seafood-free, Nut-free, Organic)
            - message (textarea)
            -->
        <div id="meeting-form">
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
                <p>Don't see your practice? <u id="add-practice">Try adding it. </u></p>
            </div>
            <div class="mt-3 mb-4">
                <label for="message" class="fw-bold mb-1">Message </label>
                <textarea name="message" class="form-control" style="overflow:auto;" id="message" rows="3"></textarea>
            </div>
        </div>

        <!-- New practice form
            - practice name (text)
            - practice type (text)
            - practice speciality (text)
            - practice email address (email)
            - practice address (text)
            - practice phone (text)
         -->
        <div id="new-practice-form">
            <p><u id="go-back">Back. </u></p>
            <div class="mt-3 mb-3">
                <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
                <input name="practice_name" type="text" class="form-control" id="practice-name">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-type" class="form-label mb-2 fw-bold">Practice Type</label>
                <input name="practice_type" type="text" class="form-control" id="practice-type">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-speciality" class="form-label mb-2 fw-bold">Practice Speciality</label>
                <input name="practice_speciality" type="text" class="form-control" id="practice-speciality">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-email" class="form-label mb-2 fw-bold">Practice Email</label>
                <input name="practice_email" type="email" class="form-control" id="practice-email">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-address" class="form-label mb-2 fw-bold">Practice Address</label>
                <input name="practice_address" type="text" class="form-control" id="practice-address">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-phone" class="form-label mb-2 fw-bold">Practice Phone</label>
                <input name="practice_phone" type="tel" class="form-control" id="practice-phone">
            </div>
        </div>


        <button type="submit" class="btn btn-dark mb-5">Submit</button>
    </form>
</div>

<script>
    // hide new practice form
    document.querySelector('#new-practice-form').style.display = 'none';

    // show new practice form and hide meeting form
    document.querySelector('#add-practice').addEventListener('click', function() {
        document.querySelector('#meeting-form').style.display = 'none';
        document.querySelector('#new-practice-form').style.display = 'block';

        // store the state of the form in local storage
        localStorage.setItem('formToShow', 'new-practice-form');
    });

    // hide new practice form and show meeting form
    document.querySelector('#go-back').addEventListener('click', function() {
        document.querySelector('#meeting-form').style.display = 'block';
        document.querySelector('#new-practice-form').style.display = 'none';

        // store the state of the form in local storage
        localStorage.setItem('formToShow', 'meeting-form');
    });

    // on page load see which form to show
    if (localStorage.getItem('formToShow') === 'new-practice-form') {
        document.querySelector('#meeting-form').style.display = 'none';
        document.querySelector('#new-practice-form').style.display = 'block';
    } else {
        document.querySelector('#meeting-form').style.display = 'block';
        document.querySelector('#new-practice-form').style.display = 'none';
    }
</script>

<?php include_once 'footer.php'; ?>