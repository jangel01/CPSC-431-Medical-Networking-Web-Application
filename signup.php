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

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            overflow-y: auto;
            /* add this line */
        }

        /* make the form scrollable on small screens */
        @media (min-width: 576px) {
            .form-signin {
                max-height: 80vh;
            }
        }

        /* make the form scrollable on medium screens */
        @media (min-width: 992px) {
            .form-signin {
                max-height: 70vh;
            }
        }

        /* make the form scrollable on large screens */
        @media (min-width: 1200px) {
            .form-signin {
                max-height: 60vh;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in-and-up.css" rel="stylesheet">
</head>

<body class="text-center text-bg-dark">

    <main class="form-signin w-100 m-auto">
        <form>
            <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
            <h1 class="h3 mb-3 fw-normal">Sign up</h1>

            <!-- radio button for type of user-->
            <p class="mb-2"> I am a... </p>
            <div class="form-check">
                <input class="form-check-input bg-dark" type="radio" name="radio-group" id="medical-radio">
                <label class="form-check-label" for="medical-radio">
                    Medical professional
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input bg-dark" type="radio" name="radio-group" id="company-radio" checked>
                <label class="form-check-label" for="company-radio">
                    Company
                </label>
            </div>

            <!-- fields for medical professional
                - email (email type)
                - password (password type)
                - name (text type)
                - address (text type)
                - phone number (tel type)
                - medical license number (text type)
                - speciality (text type)
                - role (selection type -- doctor, office manager, or other)
            -->
            <div id="medical-professional-fields">
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="email"> Email Address</label>
                    <input type="email" class="form-control text-bg-dark" id="email" name="email " placeholder="Email Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control text-bg-dark" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control text-bg-dark" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="address"> Address</label>
                    <input type="text" class="form-control text-bg-dark" id="address" name="address" placeholder="Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="phone-number"> Phone Number</label>
                    <input type="tel" class="form-control text-bg-dark" id="phone-number" name="phone_number" placeholder="Phone Number">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-license-number"> Medical License Number</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-license-number" name="medical_license_number" placeholder="Medical License Number">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="speciality"> Speciality</label>
                    <input type="text" class="form-control text-bg-dark" id="speciality" name="speciality" placeholder="Speciality">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="role"> Role</label>
                    <select class="form-select text-bg-dark" id="role" name="role">
                        <option value="empty">--</option>
                        <option value="doctor">Doctor</option>
                        <option value="office_manager">Office Manager</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <!-- fields for company
                - email (email type)
                - password (password type)
                - company name (text type)
                - company address (text type)
                - company phone number (tel type)
                - industry (text type)
            -->
            <div id="company-fields">
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="email"> Email Address</label>
                    <input type="email" class="form-control text-bg-dark" id="email" name="email " placeholder="Email Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control text-bg-dark" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="company-name"> Company Name</label>
                    <input type="text" class="form-control text-bg-dark" id="company-name" name="company_name" placeholder="Company Name">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="company-address"> Company Address</label>
                    <input type="text" class="form-control text-bg-dark" id="company-address" name="company_address" placeholder="Company Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="company-phone-number"> Company Phone Number</label>
                    <input type="tel" class="form-control text-bg-dark" id="company-phone-number" name="company_phone_number" placeholder="Company Phone Number">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="industry"> Industry</label>
                    <input type="text" class="form-control text-bg-dark" id="industry" name="industry" placeholder="Industry">
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-warning" type="submit">Continue</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


    <script>
        // hide medical professional fields on load
        document.getElementById("medical-professional-fields").style.display = "none";

        // show medical professional fields when medical professional radio button is selected
        document.getElementById("medical-radio").addEventListener("click", function() {
            document.getElementById("medical-professional-fields").style.display = "block";
            document.getElementById("company-fields").style.display = "none";
        });

        // show company fields when company radio button is selected
        document.getElementById("company-radio").addEventListener("click", function() {
            document.getElementById("medical-professional-fields").style.display = "none";
            document.getElementById("company-fields").style.display = "block";
        });

        
    </script>

</body>

</html>