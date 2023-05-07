<?php 

// inport signup trait
require_once '../traits/signup.trait.php';
class MedProfSignUpContr extends MedProfSignUp {
    use SignUpTrait;
    private $medProfEmail;
    private $medProfPassword;
    private $medProfName;
    private $medProfPhone;
    private $medProfSpecialty;
    private $medProfLicense;
    private $medProfRole;

    public function __construct($medEmail, $medPassword, $medName, $medPhone, $medSpecialty, $medLicense, $medRole) {
        $this->medProfEmail = $medEmail;
        $this->medProfPassword = $medPassword;
        $this->medProfName = $medName;
        $this->medProfPhone = $medPhone;
        $this->medProfSpecialty = $medSpecialty;
        $this->medProfLicense = $medLicense;
        $this->medProfRole = $medRole;
    }

    public function signupUser() {
        if ($this->emptyInput()) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail($this->medProfEmail)) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if ($this->emailTaken($this->medProfEmail)) {
            header("location: ../signup.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->medProfEmail, $this->medProfPassword, $this->medProfName, $this->medProfPhone, $this->medProfSpecialty, $this->medProfLicense, $this->medProfRole);
    }

    private function emptyInput() {
        if (empty($this->medProfEmail) || empty($this->medProfPassword) || empty($this->medProfName) || empty($this->medProfPhone) || empty($this->medProfSpecialty) || empty($this->medProfLicense) || empty($this->medProfRole)) {
            return true;
        } else {
            return false;
        }
    }
}