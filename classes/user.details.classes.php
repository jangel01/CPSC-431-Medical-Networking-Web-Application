<?php
class UserDetails extends Dbh
{
    // get user details -- user id and user type
    protected function getUserDetails($user_id, $user_type)
    {
        // check if medical professional
        if ($user_type == "medical_professional") {
            $sql = "SELECT * FROM medical_professional WHERE medical_professional_id = ?;";
            $stmt = $this->connect()->prepare($sql);

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "stmtfailed";
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
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }
        }
    }
}
