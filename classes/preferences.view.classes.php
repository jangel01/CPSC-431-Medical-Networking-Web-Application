<?php 

class PreferencesView extends Preferences {
    private $userType;
    private $userId;
    // constructor
    public function __construct($userType, $userId) {
        $this->userType = $userType;
        $this->userId = $userId;
    }

    // get food and availability preferences -- user_id, user_type
    public function getPreferencesContr() {
        $results = $this->getPreferences($this->userType, $this->userId);
        return $results;
    }
}