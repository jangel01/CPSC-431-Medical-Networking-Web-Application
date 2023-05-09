<?php include_once 'header.php'; ?>

<?php

include 'classes/dbh.classes.php';
include 'classes/user.details.classes.php';
include 'classes/user.details.view.classes.php';

// get user details
$userDetailsView = new UserDetailsView($_SESSION['user_id'], $_SESSION['user_type']);
$userDetails = $userDetailsView->showUserDetails();

// get current url
$url = $_SERVER['REQUEST_URI'];
$query_string = parse_url($url, PHP_URL_QUERY);

// parse the query string to get the parameters as an array
parse_str($query_string, $params);

?>
<div class="container text-center mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header">
                    <?php
                    if ($_SESSION['user_type'] == "medical_professional") {
                        echo "Medical Professional Details";
                    } else {
                        echo "Medical Company Details";
                    }
                    ?>
                </div>
                <div class="card-body">
                    <div>
                        <?php
                        if ($_SESSION['user_type'] == "medical_professional") {
                            // display medical professional fields - medical_professional_email, medical_professional_name, medical_professional_phone_number, medical_professional_specialty, medical_professional_license_number,medical_professional_role, medical_professional_food_preferences, medical_professional_availability_preferences
                            echo "<p><strong>Name:</strong> " . $userDetails[0]['medical_professional_name'] . "</p>";
                            echo "<p><strong>Email:</strong> " . $userDetails[0]['medical_professional_email'] . "</p>";
                            echo "<p><strong>Phone Number:</strong> " . $userDetails[0]['medical_professional_phone_number'] . "</p>";
                            echo "<p><strong>Specialty:</strong> " . $userDetails[0]['medical_professional_specialty'] . "</p>";
                            echo "<p><strong>License Number:</strong> " . $userDetails[0]['medical_professional_license_number'] . "</p>";
                            echo "<p><strong>Role:</strong> " . $userDetails[0]['medical_professional_role'] . "</p>";
                            echo "<p><strong>Food Preferences:</strong> " . $userDetails[0]['medical_professional_food_preferences'] . "</p>";
                            echo "<p><strong>Availability Preferences:</strong> " . $userDetails[0]['medical_professional_availability_preferences'] . "</p>";
                        } else if ($_SESSION['user_type'] == "medical_company") {
                            // display medical company details -- medical_company_email, medical_company_name, medical_company_phone_number, medical_company_address, medical_company_sector, medical_company_specialty, medical_company_food_preferences, medical_company_availability_preferences
                            echo "<p><strong>Name:</strong> " . $userDetails[0]['medical_company_name'] . "</p>";
                            echo "<p><strong>Email:</strong> " . $userDetails[0]['medical_company_email'] . "</p>";
                            echo "<p><strong>Phone Number:</strong> " . $userDetails[0]['medical_company_phone_number'] . "</p>";
                            echo "<p><strong>Address:</strong> " . $userDetails[0]['medical_company_address'] . "</p>";
                            echo "<p><strong>Sector:</strong> " . $userDetails[0]['medical_company_sector'] . "</p>";
                            echo "<p><strong>Specialty:</strong> " . $userDetails[0]['medical_company_specialty'] . "</p>";
                            echo "<p><strong>Food Preferences:</strong> " . $userDetails[0]['medical_company_food_preferences'] . "</p>";
                            echo "<p><strong>Availability Preferences:</strong> " . $userDetails[0]['medical_company_availability_preferences'] . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class = "col">
            <!-- see if user is the user associated with the page and if so display a button that sends them to edit details page-->
            <?php
            if ($_SESSION['user_id'] == $params['id']) {
                echo "<a href='edit-user-details.php?user_id=" . $params['id'] . "' class='btn btn-dark'>Edit Details</a>";
            }
            ?>
        </div>
    </div>
</div>






<?php include_once 'footer.php'; ?>