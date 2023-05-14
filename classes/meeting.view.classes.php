<?php 

class MeetingView extends Meeting {
    // get incoming meeting requests for current user
    public function getIncomingRequestsContr($user_id, $user_type) {
        return $this->getIncomingRequests($user_id, $user_type);
    }

    // get outgoing meeting requests for current user
    public function getOutgoingRequestsContr($user_id, $user_type) {
        return $this->getOutgoingRequests($user_id, $user_type);
    }

    // get accepted meetings for current user
    public function getAcceptedRequestsContr($user_id, $user_type) {
        return $this->getAcceptedMeetings($user_id, $user_type);
    }

    // get declined meetings for current user
    public function getDeclinedRequestsContr($user_id, $user_type) {
        return $this->getDeclinedMeetings($user_id, $user_type);
    }
}