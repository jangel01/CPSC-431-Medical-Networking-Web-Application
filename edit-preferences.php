<?php include_once 'header.php'; ?>

<?php

include 'classes/preferences.classes.php';
include 'classes/preferences.view.classes.php';

$currentUserPrefView = new PreferencesView($_SESSION['user_type'], $_SESSION['user_id']);
$currentUserPref = $currentUserPrefView->getPreferencesContr();

?>
<div class="container">

    <form id="preferences-form" method="POST" action="includes/edit.preferences.php">
        <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
        <h1 class="h3 mb-3 fw-normal">Availability and food preferences</h1>

        <!-- form field for availability times (vertical checkbox of the days in the week):
                    - Monday
                    - Tuesday
                    - Wednesday
                    - Thursday
                    - Friday
                    - Saturday
                    - Sunday
                -->

        <div class="mt-3 mb-3">
            <label for="availability" class="form-label">Availability</label>

            <?php if ($_SESSION['user_type'] == "medical_professional") { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Monday" id="availability1" <?php if (in_array('Monday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability1">
                        Monday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Tuesday" id="availability2" <?php if (in_array('Tuesday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability2">
                        Tuesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Wednesday" id="availability3" <?php if (in_array('Wednesday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability3">
                        Wednesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Thursday" id="availability4" <?php if (in_array('Thursday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability4">
                        Thursday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Friday" id="availability5" <?php if (in_array('Friday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability5">
                        Friday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Saturday" id="availability6" <?php if (in_array('Saturday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability6">
                        Saturday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Sunday" id="availability7" <?php if (in_array('Sunday', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability7">
                        Sunday
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Monday" id="availability1" <?php if (in_array('Monday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability1">
                        Monday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Tuesday" id="availability2" <?php if (in_array('Tuesday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability2">
                        Tuesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Wednesday" id="availability3" <?php if (in_array('Wednesday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability3">
                        Wednesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Thursday" id="availability4" <?php if (in_array('Thursday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability4">
                        Thursday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Friday" id="availability5" <?php if (in_array('Friday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability5">
                        Friday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Saturday" id="availability6" <?php if (in_array('Saturday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability6">
                        Saturday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability[]" value="Sunday" id="availability7" <?php if (in_array('Sunday', array_map('trim', explode(',', $currentUserPref[0]['medical_company_availability_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="availability7">
                        Sunday
                    </label>
                </div>
            <?php } ?>
        </div>

        <!-- form field for food preferences (vertical checkbox):
                    - Vegetarian
                    - Vegan
                    - Gluten-free
                    - Lactose-free
                    - Dairy-free
                    - Seafood-free
                    - Nut-free
                    - Organic
                -->

        <div class="mb-3">
            <label for="food" class="form-label">Food preferences</label>
            <?php if ($_SESSION['user_type'] == "medical_professional") { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Vegetarian" id="food1" <?php if (in_array('Vegetarian', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food1">
                        Vegetarian
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Vegan" id="food2" <?php if (in_array('Vegan', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food2">
                        Vegan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Gluten-free" id="food3" <?php if (in_array('Gluten-free', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food3">
                        Gluten-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Dairy-free" id="food4" <?php if (in_array('Dairy-free', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food4">
                        Dairy-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Seafood-free" id="food5" <?php if (in_array('Seafood-free', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food5">
                        Seafood-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Nut-free" id="food6" <?php if (in_array('Nut-free', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food6">
                        Nut-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Organic" id="food7" <?php if (in_array('Organic', array_map('trim', explode(',', $currentUserPref[0]['medical_professional_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food7">
                        Organic
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Vegetarian" id="food1" <?php if (in_array('Vegetarian', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food1">
                        Vegetarian
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Vegan" id="food2" <?php if (in_array('Vegan', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food2">
                        Vegan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Gluten-free" id="food3" <?php if (in_array('Gluten-free', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food3">
                        Gluten-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Dairy-free" id="food4" <?php if (in_array('Dairy-free', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food4">
                        Dairy-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Seafood-free" id="food5" <?php if (in_array('Seafood-free', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food5">
                        Seafood-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Nut-free" id="food6" <?php if (in_array('Nut-free', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food6">
                        Nut-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food[]" value="Organic" id="food7" <?php if (in_array('Organic', array_map('trim', explode(',', $currentUserPref[0]['medical_company_food_preferences'])))) echo 'checked'; ?>>
                    <label class="form-check-label" for="food7">
                        Organic
                    </label>
                </div>
            <?php } ?>
        </div>

        <button class="btn btn-lg btn-dark" type="submit">Change preferences</button>
    </form>
</div>
<?php include_once 'footer.php'; ?>