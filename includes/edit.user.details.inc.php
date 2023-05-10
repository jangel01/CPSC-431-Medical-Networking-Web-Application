<?php

session_start();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../classes/dbh.classes.php";
    include "../classes/user.details.classes.php";
    include "../classes/user.details.contr.classes.php";

    if ($userType == "medical_professional") {
        // get elements from form
        $medProfEmail = $_POST['medical_professional_email'];
        $medProfName = $_POST['medical_professional_name'];
        $medProfPhone = $_POST['medical_professional_phone_number'];
        $medProfSpecialty = $_POST['medical_professional_specialty'];
        $medProfLicense = $_POST['medical_professional_license_number'];
        $medProfRole = $_POST['medical_professional_role'];

        // create new user details object
        $currentUser = new UserDetailsContr($userType, $userId, $medProfName, $medProfPhone, $medProfEmail, $medProfAddress,$medProfSpecialty, null, $medProfRole, $medProfLicense);

        // edit user details
        $currentUser->editMedProfUserDetailsContr();

        // redirect to user details page -- user type and user id
        header("location: ../user-details.php?user_type=$userType&user_id=$userId");
    } else if ($userType == "medical_company"){
        $medCompEmail = $_POST['medical_company_email'];
        $medCompName = $_POST['medical_company_name'];
        $medCompPhone = $_POST['medical_company_phone_number'];
        $medCompAddress = $_POST['medical_company_address'];
        $medCompSector = $_POST['medical_company_sector'];
        $medCompSpecialty = $_POST['medical_company_specialty'];

        // create new user details object
        $currentUser = new UserDetailsContr($userType, $userId, $medCompName, $medCompPhone, $medCompEmail, $medCompAddress, $medCompSpecialty, $medCompSector, null, null);

        // edit user details
        $currentUser->editMedCompUserDetailsContr();

        // redirect to next page
        header("location: ../user-details.php?user_type=$userType&user_id=$userId");
    }
}