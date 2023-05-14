<?php

class Meeting extends Dbh
{
    // set up a meeting between two users
    protected function setMeeting($date, $from_time, $to_time, $location, $message, $requestee, $requestee_type, $requester, $requester_type)
    {
        // check the type of user for both requester and requestee, who can be either a medical professional or medical company
        // medical professionals and medical companies can set up meetings with each other
        if ($requestee_type == "medical_professional" && $requester_type == "medical_professional") {
            $meeting_status = "Pending";
            $sql = "INSERT INTO meetings (meeting_date, meeting_start_time, meeting_end_time, meeting_location, meeting_message, medical_professional_requestee_id, medical_professional_requester_id, meeting_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($date, $from_time, $to_time, $location, $message, $requestee, $requester, $meeting_status))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $stmt = null;
        } else if ($requestee_type == "medical_professional" && $requester_type == "medical_company") {
            $meeting_status = "Pending";
            $sql = "INSERT INTO meetings (meeting_date, meeting_start_time, meeting_end_time, meeting_location, meeting_message, medical_professional_requestee_id, medical_company_requester_id, meeting_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($date, $from_time, $to_time, $location, $message, $requestee, $requester, $meeting_status))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $stmt = null;
        } else if ($requestee_type == "medical_company" && $requester_type == "medical_professional") {
            $meeting_status = "Pending";
            $sql = "INSERT INTO meetings (meeting_date, meeting_start_time, meeting_end_time, meeting_location, meeting_message, medical_company_requestee_id, medical_professional_requester_id, meeting_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($date, $from_time, $to_time, $location, $message, $requestee, $requester, $meeting_status))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $stmt = null;
        } else if ($requestee_type == "medical_company" && $requester_type == "medical_company") {
            $meeting_status = "Pending";
            $sql = "INSERT INTO meetings (meeting_date, meeting_start_time, meeting_end_time, meeting_location, meeting_message, medical_company_requestee_id, medical_company_requester_id, meeting_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($date, $from_time, $to_time, $location, $message, $requestee, $requester, $meeting_status))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $stmt = null;
        }
    }

    // get incoming requests
    protected function getIncomingRequests($user_id, $user_type)
    {
        if ($user_type == "medical_professional") {
            $sql = "SELECT * FROM meetings WHERE medical_professional_requestee_id = ? AND meeting_status = 'Pending';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } else if ($user_type == "medical_company") {
            $sql = "SELECT * FROM meetings WHERE medical_company_requestee_id = ? AND meeting_status = 'Pending';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        }
    }

    // get outgoing requests
    protected function getOutgoingRequests($user_id, $user_type)
    {
        if ($user_type == "medical_professional") {
            $sql = "SELECT * FROM meetings WHERE medical_professional_requester_id = ? AND meeting_status = 'Pending';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } else if ($user_type == "medical_company") {
            $sql = "SELECT * FROM meetings WHERE medical_company_requester_id = ? AND meeting_status = 'Pending';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        }
    }

    // get meetings for the user that have a status of accepted, both incoming and outgoing
    protected function getAcceptedMeetings($user_id, $user_type)
    {
        if ($user_type == "medical_professional") {
            $sql = "SELECT * FROM meetings WHERE (medical_professional_requestee_id = ? OR medical_professional_requester_id = ?) AND meeting_status = 'Approved';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id, $user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } else if ($user_type == "medical_company") {
            $sql = "SELECT * FROM meetings WHERE (medical_company_requestee_id = ? OR medical_company_requester_id = ?) AND meeting_status = 'Approved';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id, $user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        }
    }

    // get meetings for the user that have a status of declined, both incoming and outgoing
    protected function getDeclinedMeetings($user_id, $user_type)
    {
        if ($user_type == "medical_professional") {
            $sql = "SELECT * FROM meetings WHERE (medical_professional_requestee_id = ? OR medical_professional_requester_id = ?) AND meeting_status = 'Denied';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id, $user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } else if ($user_type == "medical_company") {
            $sql = "SELECT * FROM meetings WHERE (medical_company_requestee_id = ? OR medical_company_requester_id = ?) AND meeting_status = 'Denied';";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id, $user_id))) {
                $stmt = null;
                $error = "stmtfailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        }
    }

    // get meeting by meeting id
    protected function getMeeting($meetingId)
    {
        $sql = "SELECT * FROM meetings WHERE meeting_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($meetingId))) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        // check if no results
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $error = "stmtfailed";
            $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
            header("Location: " . $url);
            exit();
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // change meeting status to accept
    protected function acceptMeeting($meetingId, $userId, $userType)
    {
        if ($userType == "medical_professional") {
            $sql = "UPDATE meetings SET meeting_status = 'Approved' WHERE meeting_id = ? AND medical_professional_requestee_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($meetingId, $userId))) {
                $stmt = null;
                $error = "acctMtStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        } else {
            // medical company
            $sql = "UPDATE meetings SET meeting_status = 'Approved' WHERE meeting_id = ? AND medical_company_requestee_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($meetingId, $userId))) {
                $stmt = null;
                $error = "acctMtRowStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        }
    }

    // decline meeting
    protected function declineMeeting($meetingId, $userId, $userType)
    {
        if ($userType == "medical_professional") {
            $sql = "UPDATE meetings SET meeting_status = 'Denied' WHERE meeting_id = ? AND medical_professional_requestee_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($meetingId, $userId))) {
                $stmt = null;
                $error = "decMtStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        } else {
            // medical company
            $sql = "UPDATE meetings SET meeting_status = 'Denied' WHERE meeting_id = ? AND medical_company_requestee_id = ?;";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($meetingId, $userId))) {
                $stmt = null;
                $error = "decMtRowStmtFailed";
                $url = $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($error);
                header("Location: " . $url);
                exit();
            }

            $stmt = null;
        }
    }
}
