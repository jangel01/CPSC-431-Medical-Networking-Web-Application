<?php

class Preferences extends Dbh {

    // get food and availability preferences -- user_id, user_type
    protected function getPreferences($userType, $userId) {
        if ($userType == "medical_professional") {
            $sql = "SELECT medical_professional_food_preferences, medical_professional_availability_preferences FROM medical_professional WHERE medical_professional_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($userId))) {
                $stmt = null;
                $error = "medProfPrefStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "medProfPrefNotFound";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                return $results;
            }
            
        } else {
            // medical company
            $sql = "SELECT medical_company_food_preferences, medical_company_availability_preferences FROM medical_company WHERE medical_company_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($userId))) {
                $stmt = null;
                $error = "medCompPrefStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "medCompPrefNotFound";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                return $results;
            }
        }
    }

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