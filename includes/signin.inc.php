<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // grab the relevant data from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // instantiate SignupController object
    include "../classes/dbh.classes.php";
    include "../classes/signin.classes.php";
    include "../classes/signin.contr.classes.php";
    $signin = new SignInContr($email, $password);
    
    // Running error handlers and user signup
    $signin->signinUser();

    // redirect to next page
    header("location: ../connect.php");
}