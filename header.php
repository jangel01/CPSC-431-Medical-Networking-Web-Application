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

</head>

<body>
    <!-- Header -->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <!-- Logo -->
            <!-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> -->
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div style="padding-right:20px;">
                    <a href="homepage.php" class="d-flex align-items-center px-3 fw-bold mb-2 mb-lg-0 text-white text-decoration-none">
                        <img class="bi me-2" width="40" height="32" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
                        Scheduling Platform
                    </a>
                </div>

                <!--Navbar -->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a id="homepage" href="homepage.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a id="connect" href="connect.php" class="nav-link px-2 text-white">Connect</a></li>
                    <li><a id="manage-meetings" href="manage-meetings.php" class="nav-link px-2 text-white">Manage Meetings</a></li>
                    <li><a id="manage-preferences" href="user-details.php" class="nav-link px-2 text-white">Manage Preferences</a></li>
                </ul>

                <!-- Login and Sign-up buttons -->
                <div class="ms-auto">
                    <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                    <button type="button" class="btn btn-warning">Sign Out</button>
                </div>
            </div>
        </div>
    </header>