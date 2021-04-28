CREATE DATABASE stackoverflow;

USE stackoverflow;

CREATE TABLE MEMBRES 	(id INT AUTO_INCREMENT PRIMARY KEY,
						displayname VARCHAR(50),
						email VARCHAR(50),
						password VARCHAR(50),
						date DATETIME,
						karma INT,
						profilpic VARCHAR(50));

CREATE TABLE QUESTIONS (id INT AUTO_INCREMENT PRIMARY KEY,
						titre VARCHAR(500),
						question TEXT,
						date DATETIME,
						auteur INT,
						displayname VARCHAR(50),
						reponses INT,
						karma INT);

CREATE TABLE REPONSES (	id INT AUTO_INCREMENT PRIMARY KEY,
						question INT,
						reponse LONGTEXT,
						auteur INT,
						displayname VARCHAR(50),
						date DATETIME,
						karma INT);

CREATE TABLE KARMA (id INT AUTO_INCREMENT PRIMARY KEY,
					auteur int,
					question INT,
					reponse INT,
					date DATETIME);



INSERT INTO MEMBRES (displayname, email, date, karma, profilpic, password)
VALUES ("Jean Monet", "jean.monet@", '2021-04-16 15:03:14', 1, "profilpic/1.png", "JeanM"),
		("Gustave Eiffel", "g.eiffel@", '2021-04-16 15:06:54', 2, "profilpic/2.png", "guguE"),
		("Jean Zay", "jean.z@", '2021-04-16 15:07:37', 3, "profilpic/3.png", "JZ1904");

INSERT INTO QUESTIONS (titre, question, date, auteur, displayname, reponses, karma)
VALUES ("How do I undo 'git add' before commit ?",
			"I mistakenly added files to git using the command 'git add'.\r Is there a way to undo this ?",
	 		'2021-04-16 15:17:05',
	 		1,
	 		"Jean Monet",
	 		2,
	 		0);


INSERT INTO REPONSES (question, reponse, auteur, displayname, date, karma)
VALUES (1, "You can simply tap 'git reset'.", 2,"Gustave Eiffel", '2021-04-16 15:04:23', 1),
		(1, "You should try 'git rm --cached filename' .", 3,"Jean Zay", '2021-04-16 15:27:01', 2);


INSERT INTO KARMA (auteur, question, reponse, date)
VALUES (1, NULL, 1, '2021-04-16 15:47:39'),
		(1, NULL, 2, '2021-04-16 15:48:03'),
		(2, NULL, 2, '2021-04-16 15:49:00');
