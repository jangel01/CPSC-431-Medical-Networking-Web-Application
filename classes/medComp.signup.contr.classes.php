<?php 

class MedCompSignUpContr extends MedCompSignUp {
    private $medCompEmail;
    private $medCompPassword;
    private $medCompName;
    private $medCompPhone;
    private $medCompAddress;
    private $medCompSector;
    private $medCompSpecialty;

    public function __construct($medEmail, $medPassword, $medName, $medPhone, $medCompAddress, $medSector, $medSpecialty) {
        $this->medCompEmail = $medEmail;
        $this->medCompPassword = $medPassword;
        $this->medCompName = $medName;
        $this->medCompPhone = $medPhone;
        $this->medCompAddress = $medCompAddress;
        $this->medCompSector = $medSector;
        $this->medCompSpecialty = $medSpecialty;
    }

    public function signupUser() {
        if ($this->emptyInput()) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail()) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if ($this->emailTaken()) {
            header("location: ../signup.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->medCompEmail, $this->medCompPassword, $this->medCompName, $this->medCompPhone, $this->medCompAddress,$this->medCompSector, $this->medCompSpecialty);
    }

    private function emptyInput() {
        if (empty($this->medCompEmail) || empty($this->medCompPassword) || empty($this->medCompName) || empty($this->medCompPhone) || empty($this->medCompSector) || empty($this->medCompSpecialty)) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidEmail() {
        if (!filter_var($this->medCompEmail, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    // email taken ?
    private function emailTaken() {
        if ($this->checkUser($this->medCompEmail)) {
            return true;
        } else {
            return false;
        }
    }
}