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
            <h2 class="mb-5">Calendar</h2>

            <div class="row mb-3">
                <div class="col-6">
                    <button id="prevMonthBtn" class="btn btn-dark">&lt;</button>
                </div>
                <div class="col-6 text-end">
                    <button id="nextMonthBtn" class="btn btn-dark">&gt;</button>
                </div>
            </div>

            <div id="calendarMonthYear" class="mb-3"></div>

            <div id="calendarContainer" class="table-responsive mb-4" style="overflow-x: auto;">
                <table class="table table-striped table-bordered">
                    <thead class="text-bg-dark">
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                        <!-- Calendar body rows will be dynamically generated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr class="mt-4 mb-4">
    <!-- Display table only if there are meetings -->
    <?php if (count($acceptedMeetings) > 0) { ?>
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
                                <tr class="text-decoration-underline" style="cursor:pointer;">
                                    <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_date']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_start_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_end_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_location']; ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-decoration-underline"> Accepted Meetings</h2>
                <p class="text-center">You have no accepted meetings.</p>
            </div>
        </div>
    <?php } ?>


    <hr class="mt-4 mb-4">

    <!-- Display table only if there are meetings -->
    <?php if (count($incomingRequests) > 0) { ?>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-decoration-underline"> Incoming Requests</h2>

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
                                <tr class="text-decoration-underline" style="cursor:pointer;">
                                    <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_date']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_start_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_end_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_location']; ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-decoration-underline"> Incoming Requests</h2>
                <p class="text-center">You have no incoming requests.</p>
            </div>
        </div>
    <?php } ?>

    <hr class="mt-4 mb-4">

    <!-- Display table only if there are meetings -->
    <?php if (count($outgoingRequests) > 0) { ?>
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
                            <!-- for each loop check the type the requestee is (the organizer)-->
                            <?php foreach ($outgoingRequests as $request) { ?>
                                <tr class="text-decoration-underline" style="cursor:pointer;">
                                    <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $currentUserName; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_date']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_start_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_end_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $request['meeting_id']; ?>"><?php echo $request['meeting_location']; ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-decoration-underline"> Outgoing Requests</h2>
                <p class="text-center">You have no outgoing requests.</p>
            </div>
        </div>
    <?php } ?>

    <hr class="mt-4 mb-4">

    <!-- Display table only if there are meetings -->
    <?php if (count($declinedRequests) > 0) { ?>
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
                                <tr class="text-decoration-underline" style="cursor:pointer;">
                                    <td> <a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $organizer_name; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_date']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_start_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_end_time']; ?></a></td>
                                    <td><a class="text-dark" href="meeting-details.php?meeting_id=<?php echo $meeting['meeting_id']; ?>"><?php echo $meeting['meeting_location']; ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-decoration-underline"> Declined Meetings</h2>
                <p class="text-center">You have no declined meetings.</p>
            </div>
        </div>
    <?php } ?>
</div>


<script>
    $(document).ready(function() {
        var currentDate = new Date();

        // Populate the calendar on page load
        populateCalendar(currentDate);

        $('#prevMonthBtn').on('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            populateCalendar(currentDate);
        });

        $('#nextMonthBtn').on('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            populateCalendar(currentDate);
        });

        function populateCalendar(date) {
            // Clear previous calendar content
            $('#calendarBody').empty();

            var year = date.getFullYear();
            var month = date.getMonth();

            // Get the number of days in the month
            var daysInMonth = new Date(year, month + 1, 0).getDate();

            // Generate calendar body
            var calendarBody = $('#calendarBody');
            var calendarRow = $('<tr style="cursor:pointer;"></tr>');

            // Add empty cells for the days before the first day of the month
            var firstDay = new Date(year, month, 1).getDay();
            for (var i = 0; i < firstDay; i++) {
                calendarRow.append('<td></td>');
            }

            // Generate calendar cells for each day in the month
            for (var i = 1; i <= daysInMonth; i++) {
                var dayOfWeek = new Date(year, month, i).getDay();

                // Start a new row on Sundays (dayOfWeek = 0)
                if (dayOfWeek === 0 && i !== 1) {
                    calendarBody.append(calendarRow);
                    calendarRow = $('<tr style="cursor:pointer;"></tr>');
                }

                var dayCell = $('<td></td>').text(i).addClass('calendar-cell');

                calendarRow.append(dayCell);
            }

            // Add empty cells for the remaining days in the last week
            var lastDay = new Date(year, month, daysInMonth).getDay();
            for (var i = lastDay + 1; i < 7; i++) {
                calendarRow.append('<td></td>');
            }

            // Append the last row to the calendar body
            calendarBody.append(calendarRow);

            // Display the month and year
            var monthName = new Intl.DateTimeFormat('en-US', {
                month: 'long'
            }).format(date);
            $('#calendarMonthYear').text(monthName + ' ' + year);

            // Get the accepted meetings for the selected month
            var acceptedMeetings = <?php echo json_encode($acceptedMeetings); ?>;

            // Add meetings to the calendar
            acceptedMeetings.forEach(function(meeting) {
                var meetingDateParts = meeting['meeting_date'].split('-');
                var meetingYear = parseInt(meetingDateParts[0]);
                var meetingMonth = parseInt(meetingDateParts[1]) - 1; // Adjust for zero-based month
                var meetingDay = parseInt(meetingDateParts[2]);

                if (meetingYear === year && meetingMonth === month) {
                    var dayCell = calendarBody.find('td').eq(meetingDay + firstDay - 1);

                    var meetingId = meeting['meeting_id'];
                    var location = meeting['meeting_location'];
                    var startTime = meeting['meeting_start_time'];
                    var endTime = meeting['meeting_end_time'];
                    var meetingLink = $('<a></a>')
                        .addClass('text-dark')
                        .attr('href', 'meeting-details.php?meeting_id=' + meetingId)
                        .text(location + ' -- ' + startTime + ' to ' + endTime);

                    var meetingDetails = $('<div></div>').append(meetingLink);
                    dayCell.append(meetingDetails);
                }
            });

            // Add hover effect to calendar cells
            $('.calendar-cell').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
        }
    });
</script>

<?php include_once 'footer.php'; ?>