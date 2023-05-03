<?php include_once 'header.php'; ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h2>Search </h2>
        </div>
        <div class="row">
            <div class="col-2 mb-2">
                <select class="form-select" id="role" name="role">
                    <option value="speciality">Speciality</option>
                    <option value="role">Medical professional</option>
                    <option value="other">Industry</option>
                    <option value="other">Location</option>
                </select>
            </div>
            <div class="col-10 mb-2">
                <form>
                    <div class="form-group">
                        <div class = "input-group">

                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search...">
                            <button type="button" class="btn btn-dark">Search</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 class="mb-"> Search Results</h2>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <thead class="text-bg-dark">
                            <tr>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Location </th>
                                <th>Food preferences</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-decoration-underline" style="cursor:pointer;">
                                <td>Placeholder text</td>
                                <td class="bg-warning-subtle">Placeholder text</td>
                                <td>Placeholder text</td>
                                <td>Placeholder text</td>
                            </tr>
                            <tr class="text-decoration-underline" style="cursor:pointer;">
                                <td>Placeholder text</td>
                                <td class="bg-warning-subtle">Placeholder text</td>
                                <td>Placeholder text</td>
                                <td>Placeholder text</td>
                            </tr>
                            <tr class="text-decoration-underline" style="cursor:pointer;">
                                <td>Placeholder text</td>
                                <td class="bg-warning-subtle">Placeholder text</td>
                                <td>Placeholder text</td>
                                <td>Placeholder text</td>
                            </tr>
                            <tr class="text-decoration-underline" style="cursor:pointer;">
                                <td>Placeholder text</td>
                                <td class="bg-warning-subtle">Placeholder text</td>
                                <td>Placeholder text</td>
                                <td>Placeholder text</td>
                            </tr>
                            <tr class="text-decoration-underline" style="cursor:pointer;">
                                <td>Placeholder text</td>
                                <td class="bg-warning-subtle">Placeholder text</td>
                                <td>Placeholder text</td>
                                <td>Placeholder text</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>