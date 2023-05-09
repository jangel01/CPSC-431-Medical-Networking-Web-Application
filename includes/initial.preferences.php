<?php 

session_start();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['availability'])) {
        $availability = $_POST['availability'];
        $availability = implode(", ", $availability);
        
    } 
    
    if (isset($_POST['food'])) {
        $food = $_POST['food'];
        $food = implode(", ", $food);
    } 

}