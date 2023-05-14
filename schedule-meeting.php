<?php include_once 'header.php'; ?>

<?php
// get current url
$url = $_SERVER['REQUEST_URI'];
$query_string = parse_url($url, PHP_URL_QUERY);
// parse the query string to get the parameters as an array
parse_str($query_string, $params);

// create session for requestee
$_SESSION['requestee_id'] = $params['meeting_user_id'];
$_SESSION['requestee_type'] = $params['meeting_user_type'];

// get meeting user details
$userDetailsView = new UserDetailsView($params['meeting_user_type'], $params['meeting_user_id']);
$userDetails = $userDetailsView->showUserDetails();

?>

<div class="container mt-5">

    <?php
    // check who the meeting is with 
    if ($params['meeting_user_type'] == "medical_professional") {
        echo "<h2 class='mb-5'>Schedule a Meeting with " . $userDetails[0]['medical_professional_name'] . "</h2>";
    } else {
        echo "<h2 class='mb-5'>Schedule a Meeting with " . $userDetails[0]['medical_company_name'] . "</h2>";
    }
    ?>

    <form method = "POST" action = "includes/schedule.meeting.inc.php">
        <!-- Meeting form -- form to schedule meeting, it consists of:
            - time (text)
            - message (textarea)
            -->
        <div id="meeting-form">
            <div class="mt-3 mb-3">
                <label for="date" class="form-label mb-2 fw-bold">Date</label>
                <input name="date" type="date" class="form-control" id="date" required>
            </div>
            <div class="mt-3 mb-3">
                <label for="from-time" class="form-label mb-2 fw-bold">From</label>
                <input name="from_time" type="time" class="form-control" id="from_time" required>
            </div>
            <div class="mt-3 mb-3">
                <label for="to-time" class="form-label mb-2 fw-bold">To</label>
                <input name="to_time" type="time" class="form-control" id="to-time" required>
            </div>
            <div class="mt-3 mb-3">
                <label for="location" class="form-label mb-2 fw-bold">Location</label>
                <input name="location" type="text" class="form-control" id="location" required>
            </div>
            <div class="mt-3 mb-4">
                <label for="message" class="fw-bold mb-1">Message </label>
                <textarea name="message" class="form-control" style="overflow:auto;" id="message" rows="3" required></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-dark mb-5">Submit</button>
    </form>
</div>

<?php include_once 'footer.php'; ?>