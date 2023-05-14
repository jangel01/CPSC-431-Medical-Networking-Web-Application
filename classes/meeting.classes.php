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
}
