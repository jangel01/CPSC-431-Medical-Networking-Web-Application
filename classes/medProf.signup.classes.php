<?php

class MedProfSignUp extends Dbh
{
    protected function setUser($email, $password, $name, $phone, $specialty, $license, $role)
    {
        $sql = "INSERT INTO medical_professional (medical_professional_email, medical_professional_password, medical_professional_name, medical_professional_phone_number, medical_professional_specialty, medical_professional_license_number, medical_professional_role) VALUES (?, ?, ?, ?, ?, ?, ?)";
        // hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($email, $password, $name, $phone, $specialty, $license, $role))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email)
    {        
        $sql = "SELECT medical_professional_email AS email FROM medical_professional WHERE medical_professional_email = ? UNION SELECT medical_company_email AS email FROM medical_company WHERE medical_company_email = ?";
        
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($email, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        // check if there is a result
        if ($stmt->rowCount() > 0) {
            // there is a result so the email is taken
            return true;
        } else {
            // there is no result so the email is not taken
            return false;
        }
    }
}
