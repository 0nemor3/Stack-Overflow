CREATE DATABASE stackoverflow;

CREATE TABLE MEMBRES 	(id INT AUTO_INCREMENT PRIMARY KEY,
						displayname VARCHAR(50),
						email VARCHAR(50),
						date DATETIME,
						karma INT,
						profilpic VARCHAR(50));

CREATE TABLE QUESTIONS (titre TINYTEXT PRIMARY KEY,
						question TEXT,
						date DATETIME,
						auteur VARCHAR(50),
						reponses INT,
						karma INT);

CREATE TABLE REPONSES (reponse LONGTEXT,
						auteur VARCHAR(50),
						date DATETIME,
						karma INT);