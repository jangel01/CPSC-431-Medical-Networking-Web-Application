<?php 

// inport signup trait
class SigninContr extends Signin {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function signinUser() {
        if ($this->emptyInput()) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail($this->email)) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    private function emptyInput() {
        if (empty($this->email) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }

    // check for invalid email 
    private function invalidEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}