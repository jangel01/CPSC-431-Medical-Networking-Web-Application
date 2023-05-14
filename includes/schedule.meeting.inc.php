<?php 
session_start();
$requester = $_SESSION['user_id'];
$requester_type = $_SESSION['user_type'];
$requestee = $_SESSION['requestee_id'];
$requestee_type = $_SESSION['requestee_type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '../classes/dbh.classes.php';
    include '../classes/meeting.classes.php';
    include '../classes/meeting.contr.classes.php';
    // grab elements
    $date = $_POST['date'];
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];
    $location = $_POST['location'];
    $message = $_POST['message'];

    // create a new meeting
    $meetingContr = new MeetingContr();
    $meetingContr->createMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type);

    // redirect to meeting management page
    header("Location: ../manage-meetings.php");
}