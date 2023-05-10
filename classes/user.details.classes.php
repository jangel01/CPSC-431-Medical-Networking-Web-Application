<?php
class UserDetails extends Dbh
{
    // get user details -- user id and user type
    protected function getUserDetails($userType, $userId)
    {
        // check if medical professional
        if ($userType == "medical_professional") {
            $sql = "SELECT * FROM medical_professional WHERE medical_professional_id = ?;";
            $stmt = $this->connect()->prepare($sql);

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($userId))) {
                $stmt = null;
                $error = "getMedProfUsrDtsStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "getMedProfUsrDtsRowStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }
        } else {
            // medical company
            $sql = "SELECT * FROM medical_company WHERE medical_company_id = ?;";
            $stmt = $this->connect()->prepare($sql);

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($userId))) {
                $stmt = null;
                $error = "getMedCompUsrDtsStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "getMedProfUsrDtsRowStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }
        }
    }

    // set medical professional practice exist boolean
    protected function setPracticeExistBool($userId, $bool)
    {
        $sql = "UPDATE medical_professional SET medical_professional_practice_exist = ? WHERE medical_professional_id = ?;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($bool, $userId))) {
            $stmt = null;
            $error = "setMedProfPracticeStmtFailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $stmt = null;
    }

    // set preferences exist boolean for both medical professional and medical company
    protected function setPreferencesExistBool($userId, $userType, $bool)
    {
        if ($userType == "medical_professional") {
            $sql = "UPDATE medical_professional SET medical_professional_preferences_exist = ? WHERE medical_professional_id = ?;";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($bool, $userId))) {
                $stmt = null;
                $error = "setMedProfPrefStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        } else {
            $sql = "UPDATE medical_company SET medical_company_preferences_exist = ? WHERE medical_company_id = ?;";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($bool, $userId))) {
                $stmt = null;
                $error = "setMedCompPrefStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        }
    }

    // edit user details -- medical professional (name, email, phone, specialty, license number, role)
    protected function editMedProfUserDetails($name, $email, $phone, $specialty, $licenseNumber, $role, $userId)
    {
        $sql = "UPDATE medical_professional SET medical_professional_name = ?, medical_professional_email = ?, medical_professional_phone_number = ?, medical_professional_specialty = ?, medical_professional_license_number = ?, medical_professional_role = ? WHERE medical_professional_id = ?;";
        $stmt = $this->connect()->prepare($sql);

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($name, $email, $phone, $specialty, $licenseNumber, $role, $userId))) {
            $stmt = null;
            $error = "editMedProfUsrDtsStmtFailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $stmt = null;
    }

    // edit user details -- medical company (name, email, phone, address, sector, specialty)
    protected function editMedCompUserDetails($name, $email, $phone, $address, $sector, $specialty, $userId) {
        $sql = "UPDATE medical_company SET medical_company_name = ?, medical_company_email = ?, medical_company_phone_number = ?, medical_company_address = ?, medical_company_sector = ?, medical_company_specialty = ? WHERE medical_company_id = ?;";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($name, $email, $phone, $address, $sector, $specialty, $userId))) {
            
            $stmt = null;
            $error = "editMedCompDtsStmtFailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $stmt = null;
    }
}
