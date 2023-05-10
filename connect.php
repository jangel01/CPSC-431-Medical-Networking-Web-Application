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
                                <option value="specialty">Speciality</option>
                                <option value="medical_professional_name">Medical professional name</option>
                                <option value="medical_company_name">Medical Company name</option>
                                <option value="location">Location</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Search...">
                            <button type="button" class="btn btn-dark">Search</button>
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

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
            echo '            <table class="table table-striped table-bordered">';
            echo '                <thead class="text-bg-dark">';
            echo '                    <tr>';
            echo '                        <th>Name</th>';
            echo '                        <th>Role</th>';
            echo '                        <th>Speciality</th>';
            echo '                    </tr>';
            echo '                </thead>';
            echo '                <tbody>';

            foreach ($results as $result) {
                echo '                <tr class="text-decoration-underline" style="cursor:pointer;">';
                echo '                    <td>' . $result['medical_professional_name'] . '</td>';
                echo '                    <td>' . $result['medical_professional_role'] . '</td>';
                echo '                    <td class="bg-warning-subtle">' . $result['medical_professional_specialty'] . '</td>';
                echo '                </tr>';
            }

            echo '                </tbody>';
            echo '            </table>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';

            $results = $userDetailsView->showMedicalCompaniesBySpecialty($searchQuery);

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <h4> Medical Companies</h4>';
            echo '    </div>';
            echo '</div>';

            echo '<div class="row">';
            echo '    <div class="col-12">';
            echo '        <div class="table-responsive mb-3" style="overflow-x: auto;">';
            echo '            <table class="table table-striped table-bordered">';
            echo '                <thead class="text-bg-dark">';
            echo '                    <tr>';
            echo '                        <th>Company Name</th>';
            echo '                        <th>Sector</th>';
            echo '                        <th>Speciality</th>';
            echo '                    </tr>';
            echo '                </thead>';
            echo '                <tbody>';

            foreach ($results as $result) {
                echo '                <tr class="text-decoration-underline" style="cursor:pointer;">';
                echo '                    <td>' . $result['medical_company_name'] . '</td>';
                echo '                    <td>' . $result['medical_company_sector'] . '</td>';
                echo '                    <td class="bg-warning-subtle">' . $result['medical_company_specialty'] . '</td>';
                echo '                </tr>';
            }

            echo '                </tbody>';
            echo '            </table>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        } else if ($searchFilter == "medical_professional_name") {
            $results = $userDetailsView->showMedicalProfessionalsByName($searchQuery);
        } else if ($searchFilter == "medical_company_name") {
            $results = $userDetailsView->showMedicalCompaniesByName($searchQuery);
        } else if ($searchFilter == "location") {
            $results = $userDetailsView->showMedicalProfessionalsByLocation($searchQuery);
        }
    }
    ?>

    <!-- <div class="row">
        <div class="col-12">
            <h4> Medical Professionals</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive mb-3" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Speciality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                            <td>Placeholder text</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                            <td>Placeholder text</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                            <td>Placeholder text</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="col-12">
            <h4> Medical Companies</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Company Name</th>
                            <th>Speciality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Placeholder text</td>
                            <td class="bg-warning-subtle">Placeholder text</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
</div>

<?php include_once 'footer.php'; ?>