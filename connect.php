<?php include_once 'header.php'; ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h2>Search </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-2 mb-2">
            <select class="form-select" id="search-filter" name="search-filter">
                <option value="speciality">Speciality</option>
                <option value="medical_professional">Medical professional</option>
                <option value="medical_company">Medical Company</option>
                <option value="practice_location">Practice Location</option>
            </select>
        </div>
        <div class="col-10 mb-4">
            <form id="search-form">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Search...">
                        <button type="button" class="btn btn-dark">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="mb-2"> Search Results</h2>
        </div>
    </div>

    <div class="row">
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
    </div>

    <div class="row">
        <div class="col-12">
            <h4> Medical Comanies</h4>
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
    </div>
</div>

<?php include_once 'footer.php'; ?>