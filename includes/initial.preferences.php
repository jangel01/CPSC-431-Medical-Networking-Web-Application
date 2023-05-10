<?php

session_start();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../classes/dbh.classes.php";
    include "../classes/user.details.classes.php";
    include "../classes/user.details.contr.classes.php";
    include "../classes/preferences.classes.php";
    include "../classes/preferences.contr.classes.php";

    if (isset($_POST['availability'])) {
        $availability = $_POST['availability'];
        $availability = implode(", ", $availability);

        $initPreferences = new PreferencesContr($userId, $userType, $availability);

        // set availability preferences
        $initPreferences->setAvailabilityPreferencesContr();

        // redirect to next page
        header("location: ../homepage.php");
    } else {
        $availability = "None";
        $initPreferences = new PreferencesContr($userId, $userType, $availability);

        // set availability preferences
        $initPreferences->setAvailabilityPreferencesContr();
    }

    if (isset($_POST['food'])) {
        $food = $_POST['food'];
        $food = implode(", ", $food);

        $initPreferences = new PreferencesContr($userId, $userType, null, $food);

        // set food preferences
        $initPreferences->setFoodPreferencesContr();
    } else {
        $food = "None";
        $initPreferences = new PreferencesContr($userId, $userType, null, $food);

        // set food preferences
        $initPreferences->setFoodPreferencesContr();
    }

    // set preferences exist to true
    $currentUser = new UserDetailsContr($userType, $userId, null, null, null, null, null, null, null, null);
    $currentUser->setPreferencesExistBoolContr(1);

    // redirect to next page
    header("location: ../homepage.php");
}
