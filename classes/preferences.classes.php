<?php

class Preferences extends Dbh {
    // set food preferences -- user_id, food_preferences, user_type
    public function setFoodPreferences($userId, $foodPreferences, $userType) {
        if ($userType == "medical_professional") {
            $sql = "UPDATE medical_professional SET medical_professional_food_preferences = ? WHERE medical_professional_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($foodPreferences, $userId))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
        } else {
            // medical company
            $sql = "UPDATE medical_company SET medical_company_food_preferences = ? WHERE medical_company_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($foodPreferences, $userId))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
        }
    }
    
    // set availability preferences -- user_id, availability_preferences, user_type
    protected function setAvailabilityPreferences($userId, $availabilityPreferences, $userType) {
        if ($userType == "medical_professional") {
            $sql = "UPDATE medical_professional SET medical_professional_availability_preferences = ? WHERE medical_professional_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($availabilityPreferences, $userId))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
        } else {
            // medical company
            $sql = "UPDATE medical_company SET medical_company_availability_preferences = ? WHERE medical_company_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($availabilityPreferences, $userId))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
        }
    }
    
}