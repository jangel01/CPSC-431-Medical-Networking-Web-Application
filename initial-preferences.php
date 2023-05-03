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
            <h1 class="h3 mb-3 fw-normal">Availability and food preferences</h1>


            <!-- form field for availability times (vertical checkbox of the days in the week):
                - Monday
                - Tuesday
                - Wednesday
                - Thursday
                - Friday
                - Saturday
                - Sunday
            -->
            <div class="mb-3">
                <label for="availability" class="form-label">Availability</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability1" value="Monday" id="availability1">
                    <label class="form-check-label" for="availability1">
                        Monday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability2" value="Tuesday" id="availability2">
                    <label class="form-check-label" for="availability2">
                        Tuesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability3" value="Wednesday" id="availability3">
                    <label class="form-check-label" for="availability3">
                        Wednesday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability4" value="Thursday" id="availability4">
                    <label class="form-check-label" for="availability4">
                        Thursday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability5" value="Friday" id="availability5">
                    <label class="form-check-label" for="availability5">
                        Friday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability6" value="Saturday" id="availability6">
                    <label class="form-check-label" for="availability6">
                        Saturday
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="availability7" value="Sunday" id="availability7">
                    <label class="form-check-label" for="availability7">
                        Sunday
                    </label>
                </div>
            </div>

            <!-- form field for food preferences (vertical checkbox):
                - Vegetarian
                - Vegan
                - Gluten-free
                - Lactose-free
                - Dairy-free
                - Seafood-free
                - Nut-free
                - Organic
            -->

            <div class="mb-3">
                <label for="availability" class="form-label">Food preferences</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food1" value="Vegetarian" id="food1">
                    <label class="form-check-label" for="food1">
                        Vegetarian
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food2" value="Vegan" id="food2">
                    <label class="form-check-label" for="food2">
                        Vegan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food3" value="Gluten-free" id="food3">
                    <label class="form-check-label" for="food3">
                        Gluten-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food4" value="Dairy-free" id="food4">
                    <label class="form-check-label" for="food4">
                        Dairy-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food5" value="Seafood-free" id="food5">
                    <label class="form-check-label" for="food5">
                        Seafood-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food6" value="Nut-free" id="food6">
                    <label class="form-check-label" for="food6">
                        Nut-free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="food7" value="Organic" id="food7">
                    <label class="form-check-label" for="food7">
                        Organic
                    </label>
                </div>
            </div>


            <button class="w-100 btn btn-lg btn-warning" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


    <script>


    </script>

</body>

</html>