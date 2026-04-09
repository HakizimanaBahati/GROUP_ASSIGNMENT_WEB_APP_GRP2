-- Database: student_db
-- Table: students

CREATE DATABASE IF NOT EXISTS student_db;
USE student_db;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50),
    dob DATE,
    email VARCHAR(100) NOT NULL,
    mobile VARCHAR(20),
    gender ENUM('Male', 'Female') NOT NULL,
    address TEXT,
    city VARCHAR(50),
    pin_code VARCHAR(10),
    state VARCHAR(50),
    country VARCHAR(50) DEFAULT 'India',
    hobbies VARCHAR(200),
    course VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for testing
INSERT INTO students (first_name, last_name, dob, email, mobile, gender, address, city, pin_code, state, country, hobbies, course) VALUES
('Rahul', 'Sharma', '2000-05-15', 'rahul.sharma@email.com', '9876543210', 'Male', '123 MG Road', 'Mumbai', '400001', 'Maharashtra', 'India', 'Reading,Cricket', 'BCA'),
('Priya', 'Patel', '2001-08-22', 'priya.patel@email.com', '9876543211', 'Female', '456 Ring Road', 'Ahmedabad', '380001', 'Gujarat', 'India', 'Dancing,Singing', 'BCom'),
('Amit', 'Kumar', '1999-03-10', 'amit.kumar@email.com', '9876543212', 'Male', '789 Station Road', 'Delhi', '110001', 'Delhi', 'India', 'Sketching,Reading', 'BSc');
