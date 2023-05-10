<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if medical professional or medical company by seeing value of radio-group
    if ($_POST['radio_group'] == 'medical_professional') {
        // grab the relevant data from the form
        $medProfEmail = $_POST['medical_professional_email'];
        $medProfPassword = $_POST['medical_professional_password'];
        $medProfName = $_POST['medical_professional_name'];
        $medProfPhone = $_POST['medical_professional_phone_number'];
        $medProfSpecialty = $_POST['medical_professional_specialty'];
        $medProfLicense = $_POST['medical_professional_license_number'];
        $medProfRole = $_POST['medical_professional_role'];

        // instantiate SignupController object
        include "../classes/dbh.classes.php";
        include "../classes/medProf.signup.classes.php";
        include "../classes/medProf.signup.contr.classes.php";
        $medProfSignup = new MedProfSignUpContr($medProfEmail, $medProfPassword, $medProfName, $medProfPhone, $medProfSpecialty, $medProfLicense, $medProfRole);
        
        // Running error handlers and user signup
        $medProfSignup->signupUser();

        // redirect to next page
        header("location: ../initial-practice.php");
    } else {
        // grab the relevant data from the form
        $medCompEmail = $_POST['medical_company_email'];
        $medCompPassword = $_POST['medical_company_password'];
        $medCompName = $_POST['medical_company_name'];
        $medCompPhone = $_POST['medical_company_phone_number'];
        $medCompAddress = $_POST['medical_company_address'];
        $medCompSector = $_POST['medical_company_sector'];
        $medCompSpecialty = $_POST['medical_company_specialty'];

        // instantiate SignupController object
        include "../classes/dbh.classes.php";
        include "../classes/medComp.signup.classes.php";
        include "../classes/medComp.signup.contr.classes.php";

        $medCompSignup = new MedCompSignUpContr($medCompEmail, $medCompPassword, $medCompName, $medCompPhone, $medCompAddress, $medCompSector, $medCompSpecialty);

        // Running error handlers and user signup
        $medCompSignup->signupUser();

        header("location: ../signin.php");
    }
}