<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if the user selected something from the dropdown and it is not empty
    if (isset($_POST['practice_name_select']) && $_POST['practice_name_select'] != "empty") {
        // grab the relevant data from the form
        $practice_name = $_POST['practice_name_select'];

        // instantiate SignupController object
        include "../classes/dbh.classes.php";
        include "../classes/initial-practice.classes.php";
        include "../classes/initial-practice.contr.classes.php";
        $initialPractice = new InitialPracticeContr($practice_name);
        
        // Running error handlers and setting up practice for user
        $initialPractice->initialPractice();

        // redirect to next page
        header("location: ../homepage.php");
    } else {
        // grab the relevant data from the form
        $practice_name = $_POST['practice_name'];
        $practice_type = $_POST['practice_type'];
        $practice_specialty = $_POST['practice_specialty'];
        $practice_email = $_POST['practice_email'];
        $practice_address = $_POST['practice_address'];
        $practice_phone = $_POST['practice_phone'];

        // instantiate SignupController object
        include "../classes/dbh.classes.php";
        include "../classes/initial-practice.classes.php";
        include "../classes/initial-practice.contr.classes.php";
        $initialPractice = new InitialPracticeContr($practice_name, $practice_type, $practice_specialty, $practice_email, $practice_address, $practice_phone);
        
        // Running error handlers and setting up practice for user
        $initialPractice->initialPractice();

        // redirect to next page
        header("location: ../homepage.php");
    }    
}