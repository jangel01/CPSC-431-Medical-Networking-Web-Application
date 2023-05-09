<?php 

// include "classes/dbh.classes.php";
// include "classes/practice.classes.php";
// include "classes/practice.view.classes.php";

// $practices = new PracticeView();

// // get all practices
// $allPractices = $practices->getAllPracticesView();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* position label to the top of the input*/
        .form-floating.form-group label {
            position: absolute;
            top: -10px;
            left: 0;
            font-size: 14px;
            color: #999;
            pointer-events: none;
            transition: all 0.2s ease-out;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in-and-up.css" rel="stylesheet">
</head>

<body class="text-center text-bg-dark">

    <main class="form-signin w-100 m-auto">
        <form id="practice-form" method="POST" action="includes/initial-practice.inc.php">
            <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
            <h1 class="h3 mb-3 fw-normal">Practice</h1>

            <div id="original-form">
                <div class=" mt-3 mb-3">
                    <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
                    <select class="form-select text-bg-dark" id="practice-name-select" name="practice_name_select">
                        <option value="empty">--</option>
                        <?php
                        // loop through all practices and display them as options
                        foreach ($allPractices as $practice) {
                            echo "<option value='" . $practice['practice_name'] . "'>" . $practice['practice_name'] . "</option>";
                        }
                        ?>
                    </select>
                    <p>Don't see your practice? <u id="add-practice" name="add_practice" style="cursor:pointer;">Try adding it. </u></p>
                </div>
            </div>

            <!-- show form if user clicks #add-practice-->
            <div id="new-practice-form">
                <p><u id="back" name="back" style="cursor:pointer;">Back </u></p>
                <div class="mt-3 mb-3">
                    <label for="practice-name" class="form-label mb-2 fw-bold">Practice Name</label>
                    <input name="practice_name" type="text" class="form-control text-bg-dark" id="practice-name">
                </div>
                <div class="mt-3 mb-3">
                    <label for="practice-type" class="form-label mb-2 fw-bold">Practice Type</label>
                    <input name="practice_type" type="text" class="form-control text-bg-dark" id="practice-type">
                </div>
                <div class="mt-3 mb-3">
                    <label for="practice-speciality" class="form-label mb-2 fw-bold">Practice Specialty</label>
                    <input name="practice_specialty" type="text" class="form-control text-bg-dark" id="practice-specialty">
                </div>
                <div class="mt-3 mb-3">
                    <label for="practice-email" class="form-label mb-2 fw-bold">Practice Email</label>
                    <input name="practice_email" type="email" class="form-control text-bg-dark" id="practice-email">
                </div>
                <div class="mt-3 mb-3">
                    <label for="practice-address" class="form-label mb-2 fw-bold">Practice Address</label>
                    <input name="practice_address" type="text" class="form-control text-bg-dark" id="practice-address">
                </div>
                <div class="mt-3 mb-3">
                    <label for="practice-phone" class="form-label mb-2 fw-bold">Practice Phone</label>
                    <input name="practice_phone" type="tel" class="form-control text-bg-dark" id="practice-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-warning" type="submit">Add practice</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


    <script>
        // grab elements
        const practiceForm = document.getElementById("practice-form");
        const originalForm = document.getElementById("original-form");
        const newPracticeForm = document.getElementById("new-practice-form");
        const addPractice = document.getElementById("add-practice");
        const back = document.getElementById("back");

        // hide new practice form
        newPracticeForm.style.display = "none";

        // show new practice form if user clicks #add-practice and remove value from select
        addPractice.addEventListener("click", function() {
            newPracticeForm.style.display = "block";
            originalForm.style.display = "none";
            document.getElementById("practice-name-select").value = "empty";
        });

        // if back is clicked, show original form
        back.addEventListener("click", function() {
            newPracticeForm.style.display = "none";
            originalForm.style.display = "block";
        });

        // form submission validation
        practiceForm.addEventListener('submit', (e) => {
            // check if original form or new practice form is being used
            if (originalForm.style.display === "block") {
                // if original form is being used, check if user selected a practice
                if (document.getElementById("practice-name-select").value === "empty") {
                    e.preventDefault();
                    alert("Please select a practice or add a new one.");
                }
            } else {
                // if new practice form is being used, check if all fields are filled out
                if (document.getElementById("practice-name").value === "" ||
                    document.getElementById("practice-type").value === "" ||
                    document.getElementById("practice-specialty").value === "" ||
                    document.getElementById("practice-email").value === "" ||
                    document.getElementById("practice-address").value === "" ||
                    document.getElementById("practice-phone").value === "") {
                    e.preventDefault();
                    alert("Please fill out all fields.");
                }
            }
        })
    </script>

</body>

</html>