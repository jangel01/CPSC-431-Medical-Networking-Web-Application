<?php 

class UserDetailsView extends UserDetails {
    private $userId;
    private $userType;

    // constructor
    public function __construct($userId, $userType) {
        $this->userId = $userId;
        $this->userType = $userType;
    }

    // get user details
    public function showUserDetails() {
        $results = $this->getUserDetails($this->userId, $this->userType);
        return $results;
    }
}