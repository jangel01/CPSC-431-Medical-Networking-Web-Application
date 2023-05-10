<?php 

class UserDetailsView extends UserDetails {
    private $userType;
    private $userId;


    // constructor
    public function __construct($userType = null, $userId = null) {
        $this->userType = $userType;
        $this->userId = $userId;
    }

    // get user details
    public function showUserDetails() {
        $results = $this->getUserDetails($this->userType, $this->userId);
        return $results;
    }

    // get all medical professionals
    public function showAllMedicalProfessionals() {
        $results = $this->getAllMedicalProfessionals();
        return $results;
    }

    // get all medical companies
    public function showAllMedicalCompanies() {
        $results = $this->getAllMedicalCompanies();
        return $results;
    }

    // get medical professionals by name
    public function showMedicalProfessionalsByName($name) {
        $results = $this->getMedicalProfessionalsByName($name);
        return $results;
    }

    // get medical companies by name
    public function showMedicalCompaniesByName($name) {
        $results = $this->getMedicalCompaniesByName($name);
        return $results;
    }

    // get medical professionals by specialty
    public function showMedicalProfessionalsBySpecialty($specialty) {
        $results = $this->getMedicalProfessionalsBySpecialty($specialty);
        return $results;
    }

    // get medical companies by specialty
    public function showMedicalCompaniesBySpecialty($specialty) {
        $results = $this->getMedicalCompaniesBySpecialty($specialty);
        return $results;
    }

    // get medical professionals by location
    public function showMedicalProfessionalsByLocation($location) {
        $results = $this->getMedicalProfessionalsByLocation($location);
        return $results;
    }

    // get medical companies by location
    public function showMedicalCompaniesByLocation($location) {
        $results = $this->getMedicalCompaniesByLocation($location);
        return $results;
    }
}