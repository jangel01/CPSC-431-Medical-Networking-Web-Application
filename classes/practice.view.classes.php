<?php 

class PracticeView extends Practice {
    private $practiceName;
    private $userId;

    // intitialize constructor, set default values to null
    public function __construct($practiceName = null, $userId = null) {
        $this->practiceName = $practiceName;
        $this->userId = $userId;
    }
    
    // get all practices
    public function getAllPracticesView() {
        $results = $this->getAllPractices();
        return $results;
    }

    // get practice by practice name
    public function getPracticeByPracticeNameView($practiceName) {
        $results = $this->getPracticeByPracticeName($practiceName);
        return $results;
    }

    // get practice from user id
    public function getPracticeByUserIdView($userId) {
        $results = $this->getPracticeByUserId($userId);
        return $results;
    }
}