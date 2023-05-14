<?php include_once 'header.php'; ?>

<?php
include 'classes/meeting.classes.php';
include 'classes/meeting.view.classes.php';

$meetingView = new MeetingView();

// get accepted meetings for current user
$acceptedMeetings = $meetingView->getAcceptedRequestsContr($_SESSION['user_id'], $_SESSION['user_type']);

// get incoming meeting requests for current user
$incomingRequests = $meetingView->getIncomingRequestsContr($_SESSION['user_id'], $_SESSION['user_type']);

// get outgoing meeting requests for current user
$outgoingRequests = $meetingView->getOutgoingRequestsContr($_SESSION['user_id'], $_SESSION['user_type']);

// get declined meetings for current user
$declinedRequests = $meetingView->getDeclinedRequestsContr($_SESSION['user_id'], $_SESSION['user_type']);

$currentUserName = null;

if ($_SESSION['user_type'] == "medical_professional") {
    $currentUserName = $currentUserDetails[0]["medical_professional_name"];
} else {
    $currentUserName = $currentUserDetails[0]["medical_company_name"];
}

?>

<div class="container mt-5 mb-5">

    <div class="row">
        <div class="col-12">
            <h2 class="mb-5 text-decoration-underline"> Accepted Meetings</h2>

            <div class="table-responsive mb-4" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <!-- for each loop check the type the requestee is (the organizer)-->
                            <?php foreach ($acceptedMeetings as $meeting) {
                                // see who is the organizer
                                $organizer_type = null;
                                $organizer_name = null;
                                if (isset($meeting['medical_professional_requester_id'])) {
                                    $organizer_type = $meeting['medical_professional_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_professional", $meeting['medical_professional_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_professional_name"];
                                } else {
                                    $organizer_type = $meeting['medical_company_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_company", $meeting['medical_company_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_company_name"];
                                }
                            ?>
                                <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_date']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_start_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_end_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_location']; ?></a></td>

                            <?php } ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr class="mt-4 mb-4">

    <div class="row">
        <div class="col-12">
            <h2 class="mb-5 text-decoration-underline"> Incoming requests</h2>

            <div class="table-responsive mb-4" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <!-- for each loop check the type the requestee is (the organizer)-->
                            <?php foreach ($incomingRequests as $request) {
                                // see who is the organizer
                                $organizer_type = null;
                                $organizer_name = null;
                                if (isset($request['medical_professional_requester_id'])) {
                                    $organizer_type = $request['medical_professional_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_professional", $request['medical_professional_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_professional_name"];
                                } else {
                                    $organizer_type = $request['medical_company_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_company", $request['medical_company_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_company_name"];
                                }
                            ?>
                                <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_date']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_start_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_end_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_location']; ?></a></td>
                            <?php } ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr class="mt-4 mb-4">

    <div class="row">
        <div class="col-12">
            <h2 class="mb-5 text-decoration-underline"> Outgoing Requests</h2>

            <div class="table-responsive mb-4" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <!-- for each loop check the type the requestee is (the organizer)-->
                            <?php foreach ($outgoingRequests as $request) { ?>
                                <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $currentUserName; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_date']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_start_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_end_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_location']; ?></a></td>
                            <?php } ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr class="mt-4 mb-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5 text-decoration-underline"> Declined Meetings</h2>

            <div class="table-responsive mb-4" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-decoration-underline" style="cursor:pointer;">
                            <!-- for each loop check the type the requestee is (the organizer)-->
                            <?php foreach ($declinedRequests as $meeting) {
                                // see who is the organizer
                                $organizer_type = null;
                                $organizer_name = null;
                                if (isset($meeting['medical_professional_requester_id'])) {
                                    $organizer_type = $meeting['medical_professional_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_professional", $meeting['medical_professional_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_professional_name"];
                                } else {
                                    $organizer_type = $meeting['medical_company_requester_id'];

                                    // get organizer name
                                    $organizerUser = new UserDetailsView("medical_company", $meeting['medical_company_requester_id']);
                                    $organizerDetails = $organizerUser->showUserDetails();
                                    $organizer_name = $organizerDetails[0]["medical_company_name"];
                                }
                            ?>
                                <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_date']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_start_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_end_time']; ?></a></td>
                                <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_location']; ?></a></td>
                            <?php } ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include_once 'footer.php'; ?>