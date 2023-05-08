<?php 

class MedCompSignUp extends Dbh {
    protected function setUser($email, $password, $name, $phone, $address, $sector, $specialty) {
        $sql = "INSERT INTO medical_company (medical_company_email, medical_company_password, medical_company_name, medical_company_phone_number, medical_company_address, medical_company_sector, medical_company_specialty) VALUES (?, ?, ?, ?, ?, ?, ?)";
        // hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($email, $password, $name, $phone, $address, $sector, $specialty))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email) {
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