<?php
session_start();

include "classes/dbh.classes.php";
include "classes/user.details.classes.php";
include "classes/user.details.view.classes.php";

// check if user is logged in and there is a user type
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"])) {
    header("Location: signin.php");
    exit();
}

// check if user has completed initial setup 
$currentUser = new UserDetailsView($_SESSION["user_type"], $_SESSION["user_id"]);
$currentUserDetails = $currentUser->showUserDetails();

if ($_SESSION["user_type"] == "medical_professional") {
    if ($currentUserDetails[0]["medical_professional_practice_exist"] == 0) {
        header("Location: initial-practice.php");
        exit();
    }
    if ($currentUserDetails[0]["medical_professional_preferences_exist"] == 0) {
        header("Location: initial-preferences.php");
        exit();
    }
} else {
    // medical company
    if ($currentUserDetails[0]["medical_company_preferences_exist"] == 0) {
        header("Location: initial-preferences.php");
        exit();
    }
}

// user details url -- user_type and user_id are passed as parameters
$user_details_url = "user-details.php?user_type=" . $_SESSION['user_type'] . "&user_id=" . $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="navbar.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        /* hover */
        tr:hover {
            background-color: #fff3cd;
        }

        td a {
            display: block;
        }

        /* Custom CSS for Calendar */
        .calendar-cell:hover {
            background-color: #fff3cd;
            cursor: pointer;
        }

        /* make hr thicker and make the color black */
        hr {
            border-top: 5px solid black;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <!-- Logo -->
            <!-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> -->
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div style="padding-right:20px;">
                    <a href="connect.php" class="d-flex align-items-center px-3 fw-bold mb-2 mb-lg-0 text-white text-decoration-none">
                        <img class="bi me-2" width="40" height="32" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
                        Scheduling Platform
                    </a>
                </div>

                <!--Navbar -->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <!-- <li><a id="homepage" href="homepage.php" class="nav-link px-2 text-white">Home</a></li> -->
                    <li><a id="connect" href="connect.php" class="nav-link px-2 text-white">Connect</a></li>
                    <li><a id="manage-meetings" href="manage-meetings.php" class="nav-link px-2 text-white">Manage Meetings</a></li>
                    <li><a id="user-details" href="<?php echo $user_details_url; ?>" class="nav-link px-2 text-white">Edit Profile</a></li>
                </ul>

                <!-- Login and Sign-up buttons -->
                <div class="ms-auto">
                    <a href="includes/logout.inc.php" class="btn btn-warning">Sign Out</a>
                </div>
            </div>
        </div>
    </header>