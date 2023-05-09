<?php

class PracticeContr extends Practice {
    private $practiceName;
    private $practiceType;
    private $practiceSpecialty;
    private $practiceEmail;
    private $practiceAddress;
    private $practicePhone;
    private $userId;

    // intitialize constructor, set default values to null
    public function __construct($practiceName = null, $userId = null, $practiceType = null, $practiceSpecialty = null, $practiceEmail = null, $practiceAddress = null, $practicePhone = null) {
        $this->practiceName = $practiceName;
        $this->practiceType = $practiceType;
        $this->practiceSpecialty = $practiceSpecialty;
        $this->practiceEmail = $practiceEmail;
        $this->practiceAddress = $practiceAddress;
        $this->practicePhone = $practicePhone;
        $this->userId = $userId;
    }

    // add practice to medical_practice table 
    public function addNewPracticeContr() {
        if (!$this->emptyValuesAll() && !$this->checkPracticeExist()) {
            $this->addNewPractice($this->practiceName, $this->practiceType, $this->practiceSpecialty, $this->practiceEmail, $this->practiceAddress, $this->practicePhone);
        } else {
            $error = "emptyvalues";
            $url = $_SERVER['REQUEST_URI'] . "?error=$error";
            header("Location: ../$url");
            exit();
        }
    }

    // associate practice with user
    public function associatePracticeContr() {
        $this->associatePractice($this->practiceName, $this->userId);
    }

    // check for empty values when all values are given
    private function emptyValuesAll() {
        if (empty($this->practiceName) || empty($this->practiceType) || empty($this->practiceSpecialty) || empty($this->practiceEmail) || empty($this->practiceAddress) || empty($this->practicePhone) || empty($this->userId)) {
            return true;
        } else {
            return false;
        }
    }

    // check if practice exist in medical_practice table by practice name
    private function checkPracticeExist() {
        if ($this->practiceName != null) {
            $results = $this->getPracticeByPracticeName($this->practiceName);
            if (empty($results)) {
                return true;
            } else {
                return false;
            }
        }
    }       
}