<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully.<br/>';

$sql = 'drop database if exists jason_schedulePlatform_db;';
mysqli_query($conn, $sql);

$sql = 'create database jason_schedulePlatform_db';
if (mysqli_query($conn, $sql)) {
    echo "Database jason_schedulePlatform_db created successfully. <br/>";
} else {
    echo "Sorry, database creation failed " . mysqli_error($conn);
}

$sql = 'use jason_schedulePlatform_db;';
mysqli_query($conn, $sql);

$sql = "drop table if exists medical_practice;";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE medical_practice (
    medical_practice_id INT AUTO_INCREMENT PRIMARY KEY,
    medical_practice_name VARCHAR(255) NOT NULL,
    medical_practice_type VARCHAR(255) NOT NULL,
    medical_practice_specialty VARCHAR(255) NOT NULL,
    medical_practice_email VARCHAR(255) NOT NULL,
    medical_practice_address VARCHAR(255) NOT NULL,
    medical_practice_phone_number VARCHAR(20) NOT NULL
  );";
if (mysqli_query($conn, $sql)) {
    echo "Medical practice table created successfully. <br/>";
} else {
    echo "Could not create medical practice table: " . mysqli_error($conn);
}

$sql = "drop table if exists medical_professional;";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE medical_professional (
    medical_professional_id INT AUTO_INCREMENT PRIMARY KEY,
    medical_professional_email VARCHAR(255) NOT NULL UNIQUE,
    medical_professional_password VARCHAR(255) NOT NULL,
    medical_professional_name VARCHAR(255) NOT NULL,
    medical_professional_phone_number VARCHAR(20) NOT NULL,
    medical_professional_specialty VARCHAR(255) NOT NULL,
    medical_professional_license_number VARCHAR(50) NOT NULL,
    medical_professional_role VARCHAR(50) NOT NULL,
    medical_professional_practice_exist BOOLEAN NOT NULL DEFAULT FALSE,
    medical_professional_preferences_exist BOOLEAN NOT NULL DEFAULT FALSE,
    medical_professional_food_preferences varchar(255),
    medical_professional_availability_preferences varchar(255),
    medical_practice_id INT,
    FOREIGN KEY (medical_practice_id) REFERENCES medical_practice(medical_practice_id)
  );";
if (mysqli_query($conn, $sql)) {
    echo "Medical professional table created successfully. <br/>";
} else {
    echo "Could not create medical professional table: " . mysqli_error($conn);
}

$sql = "drop table if exists medical_company;";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE medical_company (
    medical_company_id INT AUTO_INCREMENT PRIMARY KEY,
    medical_company_email VARCHAR(255) NOT NULL UNIQUE,
    medical_company_password VARCHAR(255) NOT NULL,
    medical_company_name VARCHAR(255) NOT NULL,
    medical_company_phone_number VARCHAR(20) NOT NULL,
    medical_company_address VARCHAR(255) NOT NULL,
    medical_company_sector VARCHAR(255) NOT NULL,
    medical_company_specialty VARCHAR(255) NOT NULL,
    medical_company_preferences_exist BOOLEAN NOT NULL DEFAULT FALSE,
    medical_company_food_preferences varchar(255),
    medical_company_availability_preferences varchar(255)
  );";
if (mysqli_query($conn, $sql)) {
    echo "Medical company table created successfully. <br/>";
} else {
    echo "Could not create medical company table: " . mysqli_error($conn);
}

$sql = "drop table if exists meetings;";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE meetings (
    meeting_id INT AUTO_INCREMENT PRIMARY KEY,
    medical_professional_requester_id INT,
    medical_company_requester_id INT,
    medical_professional_requestee_id INT,
    medical_company_requestee_id INT,
    meeting_status ENUM('Pending', 'Approved', 'Denied') NOT NULL DEFAULT 'Pending',
    meeting_location VARCHAR(255) NOT NULL,
    meeting_date DATE NOT NULL,
    meeting_start_time TIME NOT NULL,
    meeting_end_time TIME NOT NULL,
    meeting_message TEXT NOT NULL,
    FOREIGN KEY (medical_professional_requester_id) REFERENCES medical_professional(medical_professional_id),
    FOREIGN KEY (medical_company_requester_id) REFERENCES medical_company(medical_company_id),
    FOREIGN KEY (medical_professional_requestee_id) REFERENCES medical_professional(medical_professional_id),
    FOREIGN KEY (medical_company_requestee_id) REFERENCES medical_company(medical_company_id),
    CONSTRAINT chk_requester_type CHECK (
      (medical_professional_requester_id IS NOT NULL AND medical_company_requester_id IS NULL)
      OR (medical_professional_requester_id IS NULL AND medical_company_requester_id IS NOT NULL)
    ),
    CONSTRAINT chk_requestee_type CHECK (
      (medical_professional_requestee_id IS NOT NULL AND medical_company_requestee_id IS NULL)
      OR (medical_professional_requestee_id IS NULL AND medical_company_requestee_id IS NOT NULL)
    )
  );";
if (mysqli_query($conn, $sql)) {
    echo "Meetings table created successfully. <br/>";
} else {
    echo "Could not create meetings table: " . mysqli_error($conn);
}

// populate medical practice table
$sql = "INSERT INTO medical_practice (medical_practice_name, medical_practice_type, medical_practice_specialty, medical_practice_email, medical_practice_address, medical_practice_phone_number)
VALUES
  ('ABC Medical Center', 'Hospital', 'Cardiology', 'abcmedical@gmail.com', '123 Main Street, City', '123-456-7890'),
  ('XYZ Clinic', 'Clinic', 'Dermatology', 'xyzclinic@gmail.com', '456 Elm Street, Town', '987-654-3210'),
  ('PQR Family Practice', 'Clinic', 'Family Medicine', 'pqrpractice@gmail.com', '789 Oak Street, Village', '555-123-4567'),
  ('EFG Pediatrics', 'Clinic', 'Pediatrics', 'efgpediatrics@gmail.com', '321 Maple Avenue, County', '777-888-9999'),
  ('LMN Surgical Center', 'Hospital', 'General Surgery', 'lmnsurgical@gmail.com', '567 Pine Street, City', '333-444-5555'),
  ('RST Dental Clinic', 'Clinic', 'Dentistry', 'rstdental@gmail.com', '789 Oak Street, Town', '999-888-7777'),
  ('UVW Orthopedics', 'Clinic', 'Orthopedics', 'uvwortho@gmail.com', '456 Elm Street, City', '111-222-3333'),
  ('IJK Women\'s Health', 'Clinic', 'Obstetrics and Gynecology', 'ijkwomenshealth@gmail.com', '321 Maple Avenue, Village', '444-555-6666'),
  ('OPQ Mental Health', 'Clinic', 'Psychiatry', 'opqmentalhealth@gmail.com', '789 Oak Street, County', '777-666-5555');";
if (mysqli_query($conn, $sql)) {
    echo "Medical practice table populated successfully. <br/>";
} else {
    echo "Could not populate medical practice table: " . mysqli_error($conn);
}

$passwords = array(
    password_hash('johndoe', PASSWORD_DEFAULT),
    password_hash('janesmith', PASSWORD_DEFAULT),
    password_hash('maryjohnson', PASSWORD_DEFAULT),
    password_hash('michaelbrown', PASSWORD_DEFAULT),
    password_hash('sarahwilson', PASSWORD_DEFAULT),
    password_hash('alexturner', PASSWORD_DEFAULT),
    password_hash('emilyjackson', PASSWORD_DEFAULT),
);

// populate medical professional table
$sql = "INSERT INTO medical_professional (medical_professional_email, medical_professional_password, medical_professional_name, medical_professional_phone_number, medical_professional_specialty, medical_professional_license_number, medical_professional_role, medical_practice_id, medical_professional_preferences_exist, medical_professional_practice_exist, medical_professional_food_preferences, medical_professional_availability_preferences)
VALUES
    ('johndoe@example.com', '$passwords[0]', 'John Doe', '123-456-7890', 'Cardiology', '12345', 'Cardiologist', 1, TRUE, TRUE, 'Vegan', 'Monday, Tuesday, Friday'),
    ('janesmith@example.com', '$passwords[1]', 'Jane Smith', '987-654-3210', 'Dermatology', '54321', 'Dermatologist', 2, TRUE, TRUE, 'Vegetarian', 'Tuesday, Wednesday, Thursday'),
    ('maryjohnson@example.com', '$passwords[2]', 'Mary Johnson', '555-123-4567', 'Family Medicine', '67890', 'Family Physician', 3, TRUE, TRUE, 'Gluten-free, Dairy-free', 'Monday, Wednesday, Friday'),
    ('michaelbrown@example.com', '$passwords[3]', 'Michael Brown', '777-888-9999', 'Pediatrics', '13579', 'Pediatrician', 4, TRUE, TRUE, 'Seafood-free, Nut-free', 'Tuesday, Thursday, Saturday'),
    ('sarahwilson@example.com', '$passwords[4]', 'Sarah Wilson', '111-222-3333', 'Orthopedics', '24680', 'Orthopedic Surgeon', 5, TRUE, TRUE, 'Seafood-free, Organic', 'Monday, Wednesday, Friday'),
    ('alexturner@example.com', '$passwords[5]', 'Alex Turner', '444-555-6666', 'Neurology', '98765', 'Neurologist', 1, TRUE, TRUE, 'Gluten-free', 'Monday, Tuesday, Thursday'),
    ('emilyjackson@example.com', '$passwords[6]', 'Emily Jackson', '777-999-1111', 'Ophthalmology', '54321', 'Ophthalmologist', 3, TRUE, TRUE, 'Vegan, Nut-free', 'Wednesday, Friday, Sunday');
";
if (mysqli_query($conn, $sql)) {
    echo "Medical professional table populated successfully." . "<br/>";
} else {
    echo "Could not populate medical professional table: " . mysqli_error($conn);
}

// Hash the medical company passwords
$passwords = array(
    password_hash('company1', PASSWORD_DEFAULT),
    password_hash('company2', PASSWORD_DEFAULT),
    password_hash('company3', PASSWORD_DEFAULT),
);

// Populate medical company table
$sql = "INSERT INTO medical_company (medical_company_email, medical_company_password, medical_company_name, medical_company_phone_number, medical_company_address, medical_company_sector, medical_company_specialty, medical_company_preferences_exist, medical_company_food_preferences, medical_company_availability_preferences)
VALUES
    ('company1@example.com', '$passwords[0]', 'Company 1', '123-456-7890', '123 Main St', 'Pharmaceuticals', 'Research and Development', TRUE, 'Gluten-free, Vegan', 'Monday, Tuesday, Friday'),
    ('company2@example.com', '$passwords[1]', 'Company 2', '987-654-3210', '456 Elm St', 'Medical Devices', 'Manufacturing', TRUE, 'Vegetarian', 'Tuesday, Wednesday, Thursday'),
    ('company3@example.com', '$passwords[2]', 'Company 3', '555-123-4567', '789 Oak St', 'Healthcare Services', 'Consulting', TRUE, 'Seafood-free', 'Monday, Wednesday, Friday');
";
if (mysqli_query($conn, $sql)) {
    echo "Medical company table populated successfully. <br/>";
} else {
    echo "Could not populate medical company table: " . mysqli_error($conn);
}

$sql = "INSERT INTO meetings (medical_professional_requester_id, medical_company_requester_id, medical_professional_requestee_id, medical_company_requestee_id, meeting_status, meeting_location, meeting_date, meeting_start_time, meeting_end_time, meeting_message)
VALUES
    (6, NULL, 1, NULL, 'Approved', 'Fullerton', '2023-05-25', '17:00:00', '20:00:00', 'Message test'),
    (4, NULL, 1, NULL, 'Pending', 'Long Beach', '2023-05-28', '18:00:00', '20:00:00', 'Message test'),
    (1, NULL, 2, NULL, 'Pending', 'Los Angeles', '2023-06-11', '10:00:00', '13:00:00', 'Message test'),
    (NULL, 2, 1, NULL, 'Denied', 'San Francisco', '2023-06-07', '12:00:00', '13:00:00', 'Message test')
    ;
";
if (mysqli_query($conn, $sql)) {
    echo "Meetings table populated successfully. <br/>";
} else {
    echo "Could not populate meetings table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
