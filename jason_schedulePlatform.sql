drop database if exists jason_schedulePlatform_db;
create database jason_schedulePlatform_db;
use jason_schedulePlatform_db;

DROP TABLE IF EXISTS medical_practice;
CREATE TABLE medical_practice (
  medical_practice_id INT AUTO_INCREMENT PRIMARY KEY,
  medical_practice_name VARCHAR(255) NOT NULL,
  medical_practice_type VARCHAR(255) NOT NULL,
  medical_pratice_speciality VARCHAR(255) NOT NULL,
  medical_practice_email VARCHAR(255) NOT NULL,
  medical_practice_address VARCHAR(255) NOT NULL,
  medical_practice_phone_number VARCHAR(20) NOT NULL,
);

drop table if exists medical_professional;
CREATE TABLE medical_professional (
  medical_professional_id INT AUTO_INCREMENT PRIMARY KEY,
  medical_professional_email VARCHAR(255) NOT NULL,
  medical_professional_password VARCHAR(255) NOT NULL,
  medical_professional_name VARCHAR(255) NOT NULL,
  medical_profesional_phone_number VARCHAR(20) NOT NULL,
  medical_professional_speciality VARCHAR(255) NOT NULL,
  medical_professional_license_number VARCHAR(50) NOT NULL,
  medical_professional_role VARCHAR(50) NOT NULL,
  medical_practice_id INT,
  FOREIGN KEY (medical_practice_id) REFERENCES medical_practice(medical_practice_id)
);

drop table if exists medical_company;
CREATE TABLE medical_company (
  medical_company_id INT AUTO_INCREMENT PRIMARY KEY,
  medical_company_email VARCHAR(255) NOT NULL,
  medical_company_password VARCHAR(255) NOT NULL,
  medical_company_name VARCHAR(255) NOT NULL,
  medical_company_phone_number VARCHAR(20) NOT NULL,
  medical_company_sector VARCHAR(255) NOT NULL,
  medical_company_speciality VARCHAR(255) NOT NULL
);








