<?php include_once 'header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row gx-3">
        <div class="col-10">
            <h2> Upcoming Meetings</h2>
            <div class="table-responsive" style="overflow-x: auto; overflow-y: auto; max-height: 200px;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Organizer</th>
                            <th>Time</th>
                            <th>Location </th>
                            <th>Food preferences</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Dr. Smith</td>
                            <td>May 12, 2023 at 8:30 AM</td>
                            <td>XYZ Clinic</td>
                            <td>Gluten-free</td>
                            <td>Pending</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Medtronic</td>
                            <td>May 20, 2023 at 11:30 AM</td>
                            <td>GHI Healthcare</td>
                            <td>Vegan</td>
                            <td>Pending</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Dr.Lee</td>
                            <td>May 25, 2023 at 12:30 PM</td>
                            <td>PQR Clinic</td>
                            <td>Seafood-free</td>
                            <td>Confirmed</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Novartis</td>
                            <td>May 27, 2023 at 9:00 AM</td>
                            <td>STU Medical Center</td>
                            <td>Dairy-free, Nut Free</td>
                            <td>Rejected</td>
                        </tr>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <td>Medical Supplies Inc.</td>
                            <td>June 8, 2023 at 11:00 AM</td>
                            <td>EFG Hospital</td>
                            <td>Vegetarian, Nut-free</td>
                            <td>Confirmed</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-2">
            <h2>FAQ</h2>
            <ul>
                <li>
                    <p> <u>How to get started?</u> </p>
                </li>
                <li>
                    <p> <u> How to change preferences? </u></p>
                </li>
                <li>
                    <p><u>How to schedule a meeting?</u> </p>
                </li>
            </ul>
            <p> <u> View More... </u> </p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-10">
            <h3>Articles</h3>
            <div class="row py-2">
                <div class="col-md-2">
                    <img style="width:10em; height:10em;" src="https://i.pinimg.com/736x/f1/1b/31/f11b31fa87bc27432315bf359cb5bd0d.jpg" class="img-fluid">
                </div>
                <div class="col-md-10">
                    <h3>Networking in the Medical Community: Tips for Making Meaningful Connections</h3>
                    <p>Building relationships with other medical professionals is crucial for growing your practice and staying up-to-date with the latest industry developments. While the new scheduling platform can make the process easier, it's important to approach networking with a strategic mindset. In this article, we'll provide tips for making meaningful connections with other medical professionals, including attending industry events, joining professional organizations, and utilizing social media</p>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-2">
                    <img style="width:10em; height:10em;" src="data:image/jpeg;base64,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" class="img-fluid">
                </div>
                <div class="col-md-10">
                    <h3>Navigating Food Preferences in Medical Networking: How to Choose the Right Catering Options</h3>
                    <p> When it comes to scheduling breakfast or lunch meetings with other medical professionals, choosing the right catering options can make all the difference. But with different dietary restrictions and preferences, it can be challenging to find options that will please everyone. In this article, we'll provide tips for navigating food preferences in medical networking, including choosing vegetarian and gluten-free options, offering a variety of foods, and working with a caterer who can accommodate specific requests</p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <h3>Contact Us</h3>
            <ul>
                <li>
                    <p> Email: <u> schedplatform@email.com</u> </p>
                </li>
                <li>
                    <p> Phone Number: <u> 1-800-456-0249</u></p>
                </li>
                <li>
                    <p>Address: 1234 Main Street, Suite 567, Anytown, USA</p>
                </li>
            </ul>
        </div>
    </div>
</div>


<?php include_once 'footer.php'; ?>