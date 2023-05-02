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
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="text-center text-bg-dark">

    <main class="form-signin w-100 m-auto">
        <form>
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <img class="bi me-2 mb-2" width="60" src="https://www.svgrepo.com/show/38705/location-pin.svg" style="filter: invert(1);">
            <h1 class="h3 mb-3 fw-normal">Sign up</h1>

            <!-- radio button for type of user-->
            <label> I am a... </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Doctor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Provider
                </label>
            </div>

            <!-- form fields for email and password, no form floating-->
            <div class="form-floating form-group">
                <label for="email"> Email Address</label>
                <input type="email" class="form-control text-bg-dark" id="email" placeholder="Email Address">
            </div>

            <button class="w-100 btn btn-lg btn-warning" type="submit">Sign Up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>



</body>`

</html>