<?php include_once 'header.php'; ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h2>Search</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="search-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col-3 mb-2">
                        <div class="input-group">
                            <select class="form-select select-styling" id="search-filter" name="search_filter">
                                <option value="specialty" <?php if (isset($_POST['search_filter']) && $_POST['search_filter'] === 'specialty') echo 'selected'; ?>>Speciality</option>
                                <option value="medical_professional_name" <?php if (isset($_POST['search_filter']) && $_POST['search_filter'] === 'medical_professional_name') echo 'selected'; ?>>Medical professional name</option>
                                <option value="medical_company_name" <?php if (isset($_POST['search_filter']) && $_POST['search_filter'] === 'medical_company_name') echo 'selected'; ?>>Medical Company name</option>
                                <option value="location" <?php if (isset($_POST['search_filter']) && $_POST['search_filter'] === 'location') echo 'selected'; ?>>Location</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Search...">
                            <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
        $userDetailsView = new UserDetailsView();

        // Retrieve search query
        $searchQuery = $_POST["search"];

        // Retrieve selected search filter
        $searchFilter = $_POST["search_filter"];

        echo '<div class="row">';
        echo '    <div class="col-12">';
        echo '        <h2 class="mb-2"> Search Results</h2>';
        echo '    </div>';
        echo '</div>';

        // Retrieve search results based on search filter
        if ($searchFilter == "specialty") {
            $results = $userDetailsView->showMedicalProfessionalsBySpecialty($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Professionals</h4>';
            echo '    </div>';
            echo '</div>';

            // check to see if there are any results
            if (!empty($results)) {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Name</th>';
                echo '                        <th>Speciality</th>';
                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_professional';
                    $userID = $result['medical_professional_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_professional_name'] . '</a></td>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_professional_specialty'] . '</a></td>';

                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }


            $results = $userDetailsView->showMedicalCompaniesBySpecialty($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Companies</h4>';
            echo '    </div>';
            echo '</div>';

            if (!empty($results)) {

                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Company Name</th>';
                echo '                        <th>Speciality</th>';

                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_company';
                    $userID = $result['medical_company_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_company_name'] . '</a></td>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_company_specialty'] . '</a></td>';
                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }
        } else if ($searchFilter == "medical_professional_name") {
            $results = $userDetailsView->showMedicalProfessionalsByName($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Professionals</h4>';
            echo '    </div>';
            echo '</div>';

            if (!empty($results)) {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Name</th>';
                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_professional';
                    $userID = $result['medical_professional_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_professional_name'] . '</a></td>';
                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }
        } else if ($searchFilter == "medical_company_name") {
            $results = $userDetailsView->showMedicalCompaniesByName($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Companies</h4>';
            echo '    </div>';
            echo '</div>';

            if (!empty($results)) {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Company Name</th>';

                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_company';
                    $userID = $result['medical_company_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_company_name'] . '</a></td>';
                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }
        } else if ($searchFilter == "location") {
            $results = $userDetailsView->showMedicalProfessionalsByLocation($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Professionals</h4>';
            echo '    </div>';
            echo '</div>';

            if (!empty($results)) {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Name</th>';
                echo '                        <th>Practice Name</th>';
                echo '                        <th>Practice Location</th>';
                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_professional';
                    $userID = $result['medical_professional_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_professional_name'] . '</a></td>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_practice_name'] . '</a></td>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_practice_address'] . '</a></td>';
                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }


            $results = $userDetailsView->showMedicalCompaniesByLocation($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Companies</h4>';
            echo '    </div>';
            echo '</div>';

            if (!empty($results)) {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
                echo '            <table class="table table-striped table-bordered">';
                echo '                <thead class="text-bg-dark">';
                echo '                    <tr>';
                echo '                        <th>Company Name</th>';
                echo '                        <th>Company Location</th>';

                echo '                    </tr>';
                echo '                </thead>';
                echo '                <tbody>';

                foreach ($results as $result) {
                    $userType = 'medical_company';
                    $userID = $result['medical_company_id'];

                    echo '                <tr>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_company_name'] . '</a></td>';
                    echo '                    <td><a class="text-dark" href="user-details.php?user_type=' . $userType . '&user_id=' . $userID . '">' . $result['medical_company_address'] . '</a></td>';
                    echo '                </tr>';
                }

                echo '                </tbody>';
                echo '            </table>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            } else {
                echo '<div class="row">';
                echo '    <div class="col-12">';
                echo '        <h5 class="text-danger">No results found</h5>';
                echo '    </div>';
                echo '</div>';
            }
        }
    }
    ?>
</div>

<?php include_once 'footer.php'; ?>