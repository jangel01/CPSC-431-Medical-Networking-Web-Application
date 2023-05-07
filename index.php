<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <!-- Logo -->
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div style="padding-right:20px;">
                    <a href="/" class="d-flex align-items-center px-3 fw-bold mb-2 mb-lg-0 text-white text-decoration-none">
                        <img class="bi me-2" width="40" height="32" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
                        Scheduling Platform
                    </a>
                </div>

                <!-- Login and Sign-up buttons -->
                <div class="ms-auto">
                    <a href="signup.php" class="btn btn-warning me-2"> Sign Up</a>
                    <a href="signin.php" class="btn btn-warning me-2"> Log In</a>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-dark text-secondary px-4 py-5 text-center" style="min-height: 90vh; display:flex; flex-direction: column; justify-content:center;">
        <div class="py-5">
            <h1 id="title" class="display-5 fw-bold text-white">Simplify you medical networking</h1>
            <div class="col-lg-8 mx-auto">
                <p id="para" class="fs-5 mb-4">Say goodbye to cold-calling and back-and-forth emails. Streamline relationship building with medical providers and doctors using our scheduling platform: schedule breakfast and lunch meetings, customize food preferences, and gain access to a network of practices in your desired area. Get started today and experience the difference!</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="signin.php" class="btn btn-lg btn-warning"> Get Started</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="fixed-bottom text-bg-dark">
            <p class="text-center my-3">&copy; 2023 Scheduling Platform</p>
        </footer>
    </div>
</body>

</html>