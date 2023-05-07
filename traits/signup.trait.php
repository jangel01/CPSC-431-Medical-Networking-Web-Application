<?php 
trait SignUpTrait {

    private function invalidEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function emailTaken($email) {
        if ($this->checkUser($email)) {
            return true;
        } else {
            return false;
        }
    }

}

