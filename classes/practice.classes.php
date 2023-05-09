<?php

class Practice extends Dbh
{
    // get all practices
    protected function getAllPractices()
    {
        $sql = "SELECT * FROM medical_practice;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute()) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
        } else {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    // get practice by practice name
    protected function getPracticeByPracticeName($practiceName)
    {
        $sql = "SELECT * FROM medical_practice WHERE medical_practice_name = ?;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($practiceName))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $error = "practicenotfound";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        } else {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
    
    // get practice from user id
    protected function getPracticeByUserId($userId)
    {
        $sql = "SELECT * FROM medical_practice WHERE medical_practice_id = (SELECT medical_practice_id FROM medical_professional WHERE medical_professional_id = ?);";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $error = "practicenotfound";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        } else {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    // insert a new practice
    protected function addNewPractice($practiceName, $practiceType, $practiceSpecialty, $practiceEmail, $practiceAddress, $practicePhone)
    {
        $sql = "INSERT INTO medical_practice (medical_practice_name, medical_practice_type, medical_practice_specialty, medical_practice_email, medical_practice_address, medical_practice_phone_number)
        VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($practiceName, $practiceType, $practiceSpecialty, $practiceEmail, $practiceAddress, $practicePhone))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $stmt = null;
    }

    // associate a practice with a user by updating medical_practice_id from medical_professional table
    protected function associatePractice($practiceName, $userId)
    {
        $sql = "UPDATE medical_professional SET medical_practice_id = (SELECT medical_practice_id FROM medical_practice WHERE medical_practice_name = ?) WHERE medical_professional_id = ?;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($practiceName, $userId))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $stmt = null;
    }

    // see if practice exists by practice name
    protected function practiceExists($practiceName)
    {
        $sql = "SELECT * FROM medical_practice WHERE medical_practice_name = ?;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($practiceName))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            return false;
        } else {
            $stmt = null;
            return true;
        }
    }

}
