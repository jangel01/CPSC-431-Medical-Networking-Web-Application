<?php session_start();
if (isset($_SESSION['user_id'])) {
    header("location: connect.php");
    exit();
}
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
        <form id="reg-form" method="POST" action="includes/signup.inc.php">
            <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
            <h1 class="h3 mb-3 fw-normal">Sign up</h1>
            <?php if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emailtaken') { ?>
                    <p class="text-danger mb-2"> Sorry, that eamil is already taken</p>
            <?php }
            } ?>

            <p class="mb-2"> Already have an account? <a class="text-white" href="signin.php"> Sign in</a></p>
            <!-- radio button for type of user-->
            <p class="mb-2"> I am a... </p>
            <div class="form-check">
                <input class="form-check-input bg-dark" type="radio" name="radio_group" id="medical-radio" value="medical_professional" checked>
                <label class="form-check-label" for="medical-radio">
                    Medical Professional
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input bg-dark" type="radio" name="radio_group" id="company-radio" value="medical_company">
                <label class="form-check-label" for="company-radio">
                    Medical Company
                </label>
            </div>

            <!-- fields for medical professional
                - email (email type)
                - password (password type)
                - name (text type)
                - phone number (tel type)
                - medical license number (text type)
                - speciality (text type)
                - role (text type)
            -->
            <div id="medical-professional-fields">
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-email"> Email Address</label>
                    <input type="email" class="form-control text-bg-dark" id="medical-professional-email" name="medical_professional_email" placeholder="Email Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-password"> Password</label>
                    <input type="password" class="form-control text-bg-dark" id="medical-professional-password" name="medical_professional_password" placeholder="Password">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-name"> Name</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-professional-name" name="medical_professional_name" placeholder="Name">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-phone-number"> Phone Number</label>
                    <input type="tel" class="form-control text-bg-dark" id="medical-professional-phone-number" name="medical_professional_phone_number" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-speciality"> Specialty</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-professional-specialty" name="medical_professional_specialty" placeholder="Speciality">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-license-number"> Medical License Number</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-professional-license-number" name="medical_professional_license_number" placeholder="Medical License Number">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-professional-role"> Role</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-professional-role" name="medical_professional_role" placeholder="Role">
                </div>
            </div>

            <!-- fields for company
                - email (email type)
                - password (password type)
                - company name (text type)
                - company phone number (tel type)
                - company address (text type)
                - company sector (text type)
                - company speciality (text type)
            -->
            <div id="company-fields">
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-email"> Company Email Address</label>
                    <input type="email" class="form-control text-bg-dark" id="medical-company-email" name="medical_company_email" placeholder="Email Address">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-password"> Password</label>
                    <input type="password" class="form-control text-bg-dark" id="medical-company-password" name="medical_company_password" placeholder="Password">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-name"> Company Name</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-company-name" name="medical_company_name" placeholder="Company Name">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-phone-number"> Company Phone Number</label>
                    <input type="tel" class="form-control text-bg-dark" id="medical-company-phone-number" name="medical_company_phone_number" placeholder="Company Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-address"> Company Address</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-company-address" name="medical_company_address" placeholder="Company Phone Number">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-sector"> Sector</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-company-sector" name="medical_company_sector" placeholder="Sector">
                </div>
                <div class="form-floating form-group mt-3 mb-3">
                    <label for="medical-company-speciality"> Specialty</label>
                    <input type="text" class="form-control text-bg-dark" id="medical-company-specialty" name="medical_company_specialty" placeholder="speciality">
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-warning" name="submit" type="submit">Continue</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


    <script>
        // grab elements
        const medicalRadio = document.getElementById("medical-radio");
        const companyRadio = document.getElementById("company-radio");
        const medicalProfessionalFields = document.getElementById("medical-professional-fields");
        const companyFields = document.getElementById("company-fields");
        const regForm = document.getElementById("reg-form");
        const medicalProfessionalEmail = document.getElementById("medical-professional-email");
        const medicalProfessionalPassword = document.getElementById("medical-professional-password");
        const medicalProfessionalName = document.getElementById("medical-professional-name");
        const medicalProfessionalPhoneNumber = document.getElementById("medical-professional-phone-number");
        const medicalProfessionalSpeciality = document.getElementById("medical-professional-specialty");
        const medicalProfessionalLicenseNumber = document.getElementById("medical-professional-license-number");
        const medicalProfessionalRole = document.getElementById("medical-professional-role");
        const medicalCompanyEmail = document.getElementById("medical-company-email");
        const medicalCompanyPassword = document.getElementById("medical-company-password");
        const medicalCompanyName = document.getElementById("medical-company-name");
        const medicalCompanyPhoneNumber = document.getElementById("medical-company-phone-number");
        const medicalCompanyAddress = document.getElementById("medical-company-address");
        const medicalCompanySector = document.getElementById("medical-company-sector");
        const medicalCompanySpeciality = document.getElementById("medical-company-specialty");

        // on page load see which radio button is selected
        if (medicalRadio.checked) {
            medicalProfessionalFields.style.display = "block";
            companyFields.style.display = "none";
        } else if (companyRadio.checked) {
            medicalProfessionalFields.style.display = "none";
            companyFields.style.display = "block";
        }

        // show medical professional fields when medical professional radio button is selected
        medicalRadio.addEventListener("click", function() {
            medicalProfessionalFields.style.display = "block";
            companyFields.style.display = "none";
        });

        // show company fields when company radio button is selected
        companyRadio.addEventListener("click", function() {
            medicalProfessionalFields.style.display = "none";
            companyFields.style.display = "block";
        });


        // handle error validation for the medical professional form and medical company form depending on which radio button is selected
        regForm.addEventListener("submit", function(e) {
            if (medicalRadio.checked) {
                if (medicalProfessionalEmail.value === "") {
                    e.preventDefault();
                    alert("Please enter an email address");
                } else if (medicalProfessionalPassword.value === "") {
                    e.preventDefault();
                    alert("Please enter a password");
                } else if (medicalProfessionalName.value === "") {
                    e.preventDefault();
                    alert("Please enter a name");
                } else if (medicalProfessionalPhoneNumber.value === "") {
                    e.preventDefault();
                    alert("Please enter a phone number");
                } else if (medicalProfessionalSpeciality.value === "") {
                    e.preventDefault();
                    alert("Please enter a speciality");
                } else if (medicalProfessionalLicenseNumber.value === "") {
                    e.preventDefault();
                    alert("Please enter a license number");
                } else if (medicalProfessionalRole.value === "") {
                    e.preventDefault();
                    alert("Please enter a role");
                }
            } else if (companyRadio.checked) {
                if (medicalCompanyEmail.value === "") {
                    e.preventDefault();
                    alert("Please enter an email address");
                } else if (medicalCompanyPassword.value === "") {
                    e.preventDefault();
                    alert("Please enter a password");
                } else if (medicalCompanyName.value === "") {
                    e.preventDefault();
                    alert("Please enter a company name");
                } else if (medicalCompanyPhoneNumber.value === "") {
                    e.preventDefault();
                    alert("Please enter a phone number");
                } else if (medicalCompanyAddress.value === "") {
                    e.preventDefault();
                    alert("Please enter an address");
                } else if (medicalCompanySector.value === "") {
                    e.preventDefault();
                    alert("Please enter a sector");
                } else if (medicalCompanySpeciality.value === "") {
                    e.preventDefault();
                    alert("Please enter a speciality");
                }
            }
        });
    </script>

</body>

</html>