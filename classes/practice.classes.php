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
            $url = $_SERVER['REQUEST_URI'] . "?error=$error";
            header("Location: ../$url");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            exit();
        } else {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    // get user practice
    // protected function getUserPracticeInfo($userId) {
    //     $sql = "SELECT medical_practice_name, medical_practice_type, medical_pratice_specialty, medical_practice_email, medical_practice_address, medical_practice_phone_number
    //     FROM medical_practice
    //     JOIN medical_professional
    //     ON medical_practice.medical_practice_id = medical_professional.medical_practice_id
    //     WHERE medical_professional.medical_professional_id = ?;
    //     ";

    //     $stmt = $this->connect()->prepare($sql);
    // }

    // set practice -- new practice
    protected function setPractice($practiceName, $practiceType, $practiceSpecialty, $practiceEmail, $practiceAddress, $practicePhone)
    {
        $sql = "INSERT INTO medical_practice (medical_practice_name, medical_practice_type, medical_practice_specialty, medical_practice_email, medical_practice_address, medical_practice_phone_number)
        VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($practiceName, $practiceType, $practiceSpecialty, $practiceEmail, $practiceAddress, $practicePhone))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['REQUEST_URI'] . "?error=$error";
            header("Location: ../$url");
            exit();
        }
    }

    // set practice -- existing practice
    protected function setPracticeExisting($practiceName)
    {
        $sql = "INSERT INTO medical_practice (medical_practice_name)
        VALUES (?);";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$practiceName])) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['REQUEST_URI'] . "?error=$error";
            header("Location: ../$url");
            exit();
        }
    }

}
