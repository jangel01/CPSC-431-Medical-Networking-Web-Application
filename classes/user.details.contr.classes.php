<?php 

class UserDetailsContr extends UserDetails {
    private $userType;
    private $userId;

    public function __construct($userType, $userId) {
        $this->userType = $userType;
        $this->userId = $userId;
    }

    public function setPracticeExistBoolContr($bool) {
        if ($this->userType == "medical_professional") {
            $this->setPracticeExistBool($this->userId, $bool);
        } 
    }

    public function setPreferencesExistBoolContr($bool) {
        $this->setPreferencesExistBool($this->userId, $this->userType, $bool);
    }
}