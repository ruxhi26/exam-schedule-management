CREATE DATABASE IF NOT EXISTS exam_schedule_db;
USE exam_schedule_db;

CREATE TABLE admins (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
  student_id INT AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(100) NOT NULL,
  class VARCHAR(50) NOT NULL,
  roll_no VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE subjects (
  subject_id INT AUTO_INCREMENT PRIMARY KEY,
  subject_code VARCHAR(30) NOT NULL UNIQUE,
  subject_name VARCHAR(100) NOT NULL
);

CREATE TABLE rooms (
  room_id INT AUTO_INCREMENT PRIMARY KEY,
  room_name VARCHAR(50) NOT NULL UNIQUE,
  capacity INT NOT NULL
);

CREATE TABLE exams (
  exam_id INT AUTO_INCREMENT PRIMARY KEY,
  subject_id INT NOT NULL,
  room_id INT NOT NULL,
  exam_date DATE NOT NULL,
  exam_time TIME NOT NULL,
  FOREIGN KEY (subject_id) REFERENCES subjects(subject_id) ON DELETE CASCADE,
  FOREIGN KEY (room_id) REFERENCES rooms(room_id) ON DELETE CASCADE
);

INSERT INTO admins(username,password) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llCwW2Qw9vP8V0fX7m2eW');
-- The above demo hash is replaced by setup_admin.php if needed.

INSERT INTO students(student_name,class,roll_no) VALUES
('Ruchi Jain','TYBSC IT','22');

INSERT INTO subjects(subject_code,subject_name) VALUES
('SPM','Software Project Management'),
('DBMS','Database Management System'),
('AI','Artificial Intelligence');

INSERT INTO rooms(room_name,capacity) VALUES
('Room 101',60),('Room 102',50),('Lab 1',40);

INSERT INTO exams(subject_id,room_id,exam_date,exam_time) VALUES
(1,1,'2026-11-10','10:00:00'),
(2,2,'2026-11-12','10:00:00'),
(3,3,'2026-11-15','10:00:00');