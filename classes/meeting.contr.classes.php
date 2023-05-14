<?php

class MeetingContr extends Meeting {
    public function createMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type) {
        $this->setMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type);
    }

    // accept meeting
    public function acceptMeetingContr($meeting_id, $userId, $userType) {
        $this->acceptMeeting($meeting_id, $userId, $userType);
    }

    // decline meeting
    public function declineMeetingContr($meeting_id, $userId, $userType) {
        $this->declineMeeting($meeting_id, $userId, $userType);
    }
}