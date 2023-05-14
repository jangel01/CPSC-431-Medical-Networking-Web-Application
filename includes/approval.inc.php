<?php

session_start();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

// get current url
$url = $_SERVER['REQUEST_URI'];
$query_string = parse_url($url, PHP_URL_QUERY);
// parse the query string to get the parameters as an array
parse_str($query_string, $params);

$meetingId = $params['meeting_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../classes/dbh.classes.php";
    include "../classes/meeting.classes.php";
    include "../classes/meeting.contr.classes.php";

    // grab the relevant data from the form
    $approval = $_POST['approval'];

    if ($approval === "Approve") {
        $meeting = new MeetingContr();
        $meeting->acceptMeetingContr($meetingId, $userId, $userType);

        header("Location: ../meeting-details.php?meeting_id=" . $meetingId);
    } else if ($approval === "Reject") {
        $meeting = new MeetingContr();
        $meeting->declineMeetingContr($meetingId, $userId, $userType);

        header("Location: ../meeting-details.php?meeting_id=" . $meetingId);
    }
}