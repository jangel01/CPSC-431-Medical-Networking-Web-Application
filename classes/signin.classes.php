<?php

class Signin extends Dbh
{

    protected function getUser($email, $password)
    {
        // get password from database
        $sql = "SELECT medical_professional_password AS pass FROM medical_professional WHERE medical_professional_email = ? UNION SELECT medical_company_password as pass FROM medical_company WHERE medical_company_email = ?";

        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute(array($email, $email))) {
            $stmt = null;
            header("location: ../signin.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../signin.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['pass']);

        if (!$checkPassword) {
            $stmt = null;
            header("location: ../signin.php?error=wrongpassword");
            exit();
        } else {
            $sql = "SELECT medical_professional_id as user_id, 'medical_professional' as user_type FROM medical_professional WHERE medical_professional_email = ? AND medical_professional_password = ?
            UNION
            SELECT medical_company_id as user_id, 'medical_company' as user_type FROM medical_company WHERE medical_company_email = ? AND medical_company_password = ?";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($email, $passwordHashed[0]['pass'], $email, $passwordHashed[0]['pass']))) {
                $stmt = null;
                header("location: ../signin.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../signin.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            session_start();
            $_SESSION['user_id'] = $user[0]['user_id'];
            $_SESSION['user_type'] = $user[0]['user_type'];
            echo "<script>console.log('" . $_SESSION['user_id'] . "');</script>";
        }
    }
}
