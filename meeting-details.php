<?php include_once 'header.php'; ?>

<?php
include "classes/meeting.classes.php";
include "classes/meeting.view.classes.php";

// get current url
$url = $_SERVER['REQUEST_URI'];
$query_string = parse_url($url, PHP_URL_QUERY);
// parse the query string to get the parameters as an array
parse_str($query_string, $params);

$requestee = false;
$requestee_type = null;
$requestee_id = null;
$requester = false;
$requester_type = null;
$requester_id = null;

$meeting = new MeetingView();
// get meeting by id
$meetingDetails = $meeting->getMeetingContr($params['meeting_id']);

if ($_SESSION['user_type'] == 'medical_professional') {
    if (isset($meetingDetails['medical_professional_requestee_id'])) {
        if ($meetingDetails['medical_professional_requestee_id'] == $_SESSION['user_id']) {
            $requestee = true;
            $requestee_id = $meetingDetails['medical_professional_requestee_id'];
            $requestee_type = "medical_professional";
        }
    } else if (isset($meetingDetails['medical_professional_requester_id'])) {
        if ($meetingDetails['medical_professional_requester_id'] == $_SESSION['user_id']) {
            $requester = true;
            $requester_id = $meetingDetails['medical_professional_requester_id'];
            $requester_type = "medical_professional";
        }
    }
}

if ($_SESSION['user_type'] == 'medical_company') {
    if (isset($meetingDetails['medical_company_requestee_id'])) {
        if ($meetingDetails['medical_company_requestee_id'] == $_SESSION['user_id']) {
            $requestee = true;
            $requestee_id = $meetingDetails['medical_company_requestee_id'];
            $requestee_type = "medical_company";
        }
    } else if (isset($meetingDetails['medical_company_requester_id'])) {
        if ($meetingDetails['medical_company_requester_id'] == $_SESSION['user_id']) {
            $requester = true;
            $requester_id = $meetingDetails['medical_company_requester_id'];
            $requester_type = "medical_company";
        }
    }
}

if ($requestee == false && $requester == false) {
    header("Location: manage-meetings.php");
}

if (isset($meetingDetails['medical_company_requestee_id']) && $requestee == false) {
    $requestee_id = $meetingDetails['medical_company_requestee_id'];
    $requestee_type = "medical_company";
}

if (isset($meetingDetails['medical_company_requester_id']) && $requester == false) {
    $requester_id = $meetingDetails['medical_company_requester_id'];
    $requester_type = "medical_company";
}

if (isset($meetingDetails['medical_professional_requestee_id']) && $requestee == false) {
    $requestee_id = $meetingDetails['medical_professional_requestee_id'];
    $requestee_type = "medical_professional";
}

if (isset($meetingDetails['medical_professional_requester_id']) && $requester == false) {
    $requester_id = $meetingDetails['medical_professional_requester_id'];
    $requester_type = "medical_professional";
}

// get details of requestee and requester
$requesteeUser = new UserDetailsView($requestee_type, $requestee_id);
$requesterUser = new UserDetailsView($requester_type, $requester_id);

$requestee_name = $requesteeUser->showUserDetails();
$requester_name = $requesterUser->showUserDetails();

?>
<div class="container text-center mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header">
                    Meeting Details
                </div>
                <div class="card-body">
                    <div>
                        <p> <b>Organizer:</b> <a class="text-dark" href="user-details.php?user_type=<?php echo $requester_type; ?>&user_id=<?php echo $requester_id; ?>"><?php if ($requester_type == "medical_professional") {
                                                                                                                                                                                echo $requester_name[0]['medical_professional_name'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $requester_name[0]['medical_company_name'];
                                                                                                                                                                            } ?></a></p>
                        <p> <b>Requestee: </b><a class="text-dark" href="user-details.php?user_type=<?php echo $requestee_type; ?>&user_id=<?php echo $requestee_id; ?>"><?php if ($requestee_type == "medical_professional") {
                                                                                                                                                                                echo $requestee_name[0]['medical_professional_name'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $requestee_name[0]['medical_company_name'];
                                                                                                                                                                            } ?></a></p>
                        <p><b>Meeting date:</b> <?php echo $meetingDetails['meeting_date'] ?></p>
                        <p><b>Meeting start time:</b> <?php echo $meetingDetails['meeting_start_time'] ?></p>
                        <p><b>Meeting end time:</b> <?php echo $meetingDetails['meeting_end_time'] ?></p>
                        <p><b>Meeting location: </b><?php echo $meetingDetails['meeting_location'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header text-center">
                    Message
                </div>
                <div class="card-body">
                    <div>
                        <p><?php echo $meetingDetails['meeting_message'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-lg btn-dark mb-5">Button</button>
        </div>
    </div>

</div>






<?php include_once 'footer.php'; ?>