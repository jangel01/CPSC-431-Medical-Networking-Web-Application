<?php 

class UserDetailsView extends UserDetails {
    private $userType;
    private $userId;

    // constructor
    public function __construct($userType, $userId) {
        $this->userType = $userType;
        $this->userId = $userId;
    }

    // get user details
    public function showUserDetails() {
        $results = $this->getUserDetails($this->userType, $this->userId);
        return $results;
    }
}