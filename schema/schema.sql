-- CREATE USER IF NOT EXISTS 'sdrive_admin'@'localhost' IDENTIFIED BY 'admin1234';

CREATE DATABASE IF NOT EXISTS drivedb;
USE drivedb;

-- GRANT ALL PRIVILEGES ON drivedb TO 'sdrive_admin'@'localhost';

CREATE TABLE IF NOT EXISTS USERS (
  userid INT PRIMARY KEY auto_increment,
  username VARCHAR(20),
  password VARCHAR(30),
  firstname VARCHAR(20),
  lastname VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS NOTES (
    noteid INT PRIMARY KEY auto_increment,
    notetitle VARCHAR(20),
    notedescription VARCHAR (1000),
    userid INT,
    foreign key (userid) references USERS(userid)
);

CREATE TABLE IF NOT EXISTS FILES (
    fileId INT PRIMARY KEY auto_increment,
    filename VARCHAR(100),
    contenttype VARCHAR(100),
    filesize VARCHAR(100),
    userid INT,
    file_path VARCHAR(250),
    foreign key (userid) references USERS(userid)
);
