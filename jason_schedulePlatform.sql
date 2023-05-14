drop database if exists jason_schedulePlatform_db;
create database jason_schedulePlatform_db;
use jason_schedulePlatform_db;

DROP TABLE IF EXISTS medical_practice;
CREATE TABLE medical_practice (
  medical_practice_id INT AUTO_INCREMENT PRIMARY KEY,
  medical_practice_name VARCHAR(255) NOT NULL,
  medical_practice_type VARCHAR(255) NOT NULL,
  medical_practice_specialty VARCHAR(255) NOT NULL,
  medical_practice_email VARCHAR(255) NOT NULL,
  medical_practice_address VARCHAR(255) NOT NULL,
  medical_practice_phone_number VARCHAR(20) NOT NULL
);

drop table if exists medical_professional;
CREATE TABLE medical_professional (
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
);

drop table if exists medical_company;
CREATE TABLE medical_company (
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
);

-- Table to track meetings
DROP TABLE IF EXISTS meetings;
CREATE TABLE meetings (
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
);

select * from medical_professional;
select * from medical_practice;
select * from medical_company;

select * from meetings;


