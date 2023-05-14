<?php

class MeetingContr extends Meeting {
    public function createMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type) {
        $this->setMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type);
    }
}