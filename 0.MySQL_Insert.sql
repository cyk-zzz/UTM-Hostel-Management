INSERT INTO college VALUES('KRP',40,40);
INSERT INTO college VALUES('KTDI',10,10);
INSERT INTO college VALUES('KDOJ',50,50);
INSERT INTO college VALUES('KTF',30,30);

INSERT INTO student(username,password,fullname,gender,phone,email) 
VALUES('samuel','samuel12345','Samuel Utan','Female','0194786252','samuel@gmail.com');

INSERT INTO student(username,password,fullname,gender,phone,email) 
VALUES('guanyong','guanyong12345','Guan Yong','Male','0194786252','guanyong@gmail.com');

INSERT INTO student(username,password,fullname,gender,phone,email) 
VALUES('ykcheah','ykcheah12345','Cheah','Male','0194786252','cyk@gmail.com');

INSERT INTO student(username,password,fullname,gender,phone,email) 
VALUES('jhliu','jhliu12345','Liu','Female','0194786252','jhliu@gmail.com');

INSERT INTO manager(username,password,fullname,gender,phone,email) 
VALUES('samuel','12345678','Samuel Utan','Female','0194786252','samuel@gmail.com');

INSERT INTO manager(username,password,fullname,gender,phone,email) 
VALUES('guanyong','12345678','Guan Yong','Male','0194786252','guanyong@gmail.com');

INSERT INTO admin(username,password,fullname,gender,phone,email) 
VALUES('admin','admin12345','Samuel Utan','Male','0194786252','samuel@gmail.com');



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