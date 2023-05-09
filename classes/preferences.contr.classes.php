<?php 

class PreferencesContr extends Preferences {
    private $userId;
    private $userType;
    private $availability;
    private $food;

    // set constructor 
    public function __construct($userId = null, $userType = null, $availability = null, $food = null) {
        $this->userId = $userId;
        $this->userType = $userType;
        $this->availability = $availability;
        $this->food = $food;
    }

    // set food preferences -- user_id, food_preferences, user_type
    public function setFoodPreferencesContr() {
        $this->setFoodPreferences($this->userId, $this->food, $this->userType);
    }

    // set availability preferences -- user_id, availability_preferences, user_type
    public function setAvailabilityPreferencesContr() {
        $this->setAvailabilityPreferences($this->userId, $this->availability, $this->userType);
    }
}