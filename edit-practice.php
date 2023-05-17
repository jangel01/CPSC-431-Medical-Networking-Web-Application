<?php include_once 'header.php'; ?>

<?php

if ($_SESSION['user_type'] != 'medical_professional') {
    header("Location: $user_details_url");
    exit();
}

// get practice and practice view
include 'classes/practice.classes.php';
include 'classes/practice.view.classes.php';

// initialize practice view
$practiceView = new PracticeView();

// get all practices
$allPractices = $practiceView->getAllPracticesView();

// get current user practice
$currentUserPracticeView = new PracticeView(null, $_SESSION['user_id']);
$currentUserPractice = $currentUserPracticeView->getPracticeByUserIdView();

?>

<div class="container">

    <form id="practice-form" method="POST" action="includes/edit.practice.inc.php">
        <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
        <h1 class="h3 mb-3 fw-normal">Practice</h1>

        <div id="original-form">
            <div class=" mt-3 mb-3">
                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'practiceexists') { ?>
                        <p class="text-danger mb-2"> Sorry, the name of that practice already exists</p>
                <?php }
                } ?>
                <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
                <select class="form-select" id="practice-name-select" name="practice_name_select">
                    <option value="empty">--</option>
                    <?php
                    foreach ($allPractices as $practice) {
                        $selected = ($practice['medical_practice_name'] == $currentUserPractice[0]['medical_practice_name']) ? 'selected' : '';
                        echo "<option value='" . $practice['medical_practice_name'] . "' $selected>" . $practice['medical_practice_name'] . "</option>";
                    }
                    ?>
                </select>
                <p>Don't see your practice? <u id="add-practice" name="add_practice" style="cursor:pointer;">Try adding it. </u></p>
            </div>
        </div>

        <!-- show form if user clicks #add-practice-->
        <div id="new-practice-form">
            <?php if (isset($_GET['error'])) {
                if ($_GET['error'] == 'practiceexists') { ?>
                    <p class="text-danger mb-2"> Sorry, the name of that practice already exists</p>
            <?php }
            } ?>
            <p><u id="back" name="back" style="cursor:pointer;">Back </u></p>
            <div class="mt-3 mb-3">
                <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
                <input name="practice_name" type="text" class="form-control" id="practice-name">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-type" class="form-label mb-2 fw-bold">Practice Type</label>
                <input name="practice_type" type="text" class="form-control" id="practice-type">
            </div>
            <div class="mt-3 mb-3">
                <label for="practice-speciality" class="form-label mb-2 fw-bold">Practice Specialty</label>
                <input name="practice_specialty" type="text" class="form-control" id="practice-specialty">
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
                <input name="practice_phone" type="tel" class="form-control" id="practice-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            </div>
        </div>

        <button class="btn btn-lg btn-dark mb-5" type="submit">Change practice</button>
    </form>

    <script>
        // grab elements
        const practiceForm = document.getElementById("practice-form");
        const originalForm = document.getElementById("original-form");
        const newPracticeForm = document.getElementById("new-practice-form");
        const addPractice = document.getElementById("add-practice");
        const back = document.getElementById("back");
        const practiceNameSelect = document.getElementById("practice-name-select");
        const practiceName = document.getElementById("practice-name");
        const practiceType = document.getElementById("practice-type");
        const practiceSpecialty = document.getElementById("practice-specialty");
        const practiceEmail = document.getElementById("practice-email");
        const practiceAddress = document.getElementById("practice-address");
        const practicePhone = document.getElementById("practice-phone");

        // hide new practice form
        newPracticeForm.style.display = "none";

        // show new practice form if user clicks #add-practice and remove value from select
        addPractice.addEventListener("click", function() {
            newPracticeForm.style.display = "block";
            originalForm.style.display = "none";
            practiceNameSelect.value = "empty";
        });

        // if back is clicked, show original form
        back.addEventListener("click", function() {
            newPracticeForm.style.display = "none";
            originalForm.style.display = "block";
        });

        // form submission validation
        practiceForm.addEventListener('submit', (e) => {
            // check if original form or new practice form is being used
            if (getComputedStyle(newPracticeForm).display === "none" && getComputedStyle(originalForm).display === "block") {
                // if original form is being used, check if user selected a practice
                if (practiceNameSelect.value === "empty") {
                    e.preventDefault();
                    alert("Please select a practice or add a new one.");
                }
            } else {
                // if new practice form is being used, check if all fields are filled out
                if (practiceName.value === "" ||
                    practiceType.value === "" ||
                    practiceSpecialty.value === "" ||
                    practiceEmail.value === "" ||
                    practiceAddress.value === "" ||
                    practicePhone.value === "") {
                    e.preventDefault();
                    alert("Please fill out all fields.");
                }
            }
        })
    </script>
</div>
<?php include_once 'footer.php'; ?>