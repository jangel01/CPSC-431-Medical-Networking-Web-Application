<?php

class UserDetailsContr extends UserDetails
{
    private $userType;
    private $userId;

    private $name;

    private $phone;

    private $email;

    private $address;

    private $specialty;

    private $sector;

    private $licenseNumber;

    private $role;

    public function __construct($userType, $userId, $name, $phone, $email, $address, $specialty, $sector, $role, $licenseNumber)
    {
        $this->userType = $userType;
        $this->userId = $userId;

        $this->name = $name;

        $this->phone = $phone;

        $this->email = $email;

        $this->address = $address;

        $this->specialty = $specialty;

        $this->sector = $sector;

        $this->licenseNumber = $licenseNumber;

        $this->role = $role;
    }

    public function setPracticeExistBoolContr($bool)
    {
        if ($this->userType == "medical_professional") {
            $this->setPracticeExistBool($this->userId, $bool);
        }
    }

    public function setPreferencesExistBoolContr($bool)
    {
        $this->setPreferencesExistBool($this->userId, $this->userType, $bool);
    }

    // edit user details -- medical professional (name, email, phone, specialty, license number, role)
    public function editMedProfUserDetailsContr()
    {
        if ($this->userType == "medical_professional") {
            $this->editMedProfUserDetails($this->name, $this->email, $this->phone, $this->specialty, $this->licenseNumber, $this->role, $this->userId);
        }
    }

    // edit user details -- medical company (name, email, phone, address, sector, specialty)
    public function editMedCompUserDetailsContr()
    {
        if ($this->userType == "medical_company") {
            $this->editMedCompUserDetails($this->name, $this->email, $this->phone, $this->address, $this->sector, $this->specialty, $this->userId);
        }
    }
}
