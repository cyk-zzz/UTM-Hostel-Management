DELETE FROM manager;
DELETE FROM application;
DELETE FROM student;
ALTER TABLE manager AUTO_INCREMENT = 1;
ALTER TABLE student AUTO_INCREMENT = 1;
ALTER TABLE application AUTO_INCREMENT = 1;



/*
$_SESSION["year"] = 2022;
$_SESSION["semester"] = 1;

student--------------
username:	samuel
password: 	samuel12345

username:	guanyong
password: 	guanyong12345

username:	jhliu
password: 	jhliu12345

username:	ykcheah
password: 	ykcheah12345

manager--------------
username:	samuel
password: 	12345678

username:	guanyong
password: 	12345678

admin----------------
username: admin
password: admin12345
*/