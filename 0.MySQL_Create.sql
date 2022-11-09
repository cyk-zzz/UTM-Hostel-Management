CREATE DATABASE student_college;

CREATE TABLE student(
	id BIGINT UNSIGNED AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	fullname VARCHAR(50) NOT NULL,
	gender ENUM('Female', 'Male') NOT NULL,
	phone VARCHAR(11) NOT NULL,
	email VARCHAR(50),
	PRIMARY KEY (id)
);

CREATE TABLE admin(
	id BIGINT UNSIGNED AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	fullname VARCHAR(50) NOT NULL,
	gender ENUM('Female', 'Male') NOT NULL,
	phone VARCHAR(11) NOT NULL,
	email VARCHAR(50),
	PRIMARY KEY (id)
);

CREATE TABLE manager(
	id	BIGINT UNSIGNED AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	fullname VARCHAR(50) NOT NULL,
	gender ENUM('Female', 'Male') NOT NULL,
	phone VARCHAR(11) NOT NULL,
	email VARCHAR(50),
	PRIMARY KEY (id)
);

CREATE TABLE college(
	name VARCHAR(50),
	room_count INT NOT NULL,
	empty_room INT NOT NULL,
	PRIMARY KEY (name)
);

CREATE TABLE application(
	id BIGINT UNSIGNED AUTO_INCREMENT,
	student_id BIGINT UNSIGNED,
	college_name VARCHAR(50),
	apply_date DATE,
	year INT,
	semester INT,
	status ENUM('Pending', 'Approved', 'Rejected') NOT NULL,
	FOREIGN KEY (student_id) REFERENCES student(id),
	FOREIGN KEY (college_name) REFERENCES college(name),
	PRIMARY KEY (id,student_id,college_name)
);