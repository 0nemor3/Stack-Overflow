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
						auteur VARCHAR(50),
						reponses INT,
						karma INT);

CREATE TABLE REPONSES (	id INT AUTO_INCREMENT PRIMARY KEY,
						question INT,
						reponse LONGTEXT,
						auteur VARCHAR(50),
						date DATETIME,
						karma INT);

CREATE TABLE KARMA (id INT AUTO_INCREMENT PRIMARY KEY,
					auteur VARCHAR(50),
					question INT,
					reponse INT,
					date DATETIME);



INSERT INTO MEMBRES (displayname, email, date, karma, profilpic, password)
VALUES ("Jean Monet", "jean.monet@", '2021-04-16 15:03:14', 1, "profilpic/Jean Monet.png", "JeanM"),
		("Gustave Eiffel", "g.eiffel@", '2021-04-16 15:06:54', 2, "profilpic/Gustave Eiffel.png", "guguE"),
		("Jean Zay", "jean.z@", '2021-04-16 15:07:37', 3, "profilpic/Jean Zay.png", "JZ1904");

INSERT INTO QUESTIONS (titre, question, date, auteur, reponses, karma)
VALUES ("How do I undo 'git add' before commit ?",
			"I mistakenly added files to git using the command 'git add'.\r Is there a way to undo this ?",
	 		'2021-04-16 15:17:05',
	 		"Jean Monet",
	 		2,
	 		0),
		("Insert <div> under the header on a specific category page",
			"In my Wordpress website i made this code in header.php that write html under the header only if you are on a specific post (product) page,

			<?php
			$post = get_post();
			    if ( $post->ID == 'postid' ){
			        echo '<div>
			            <p>'text'
			            </p>
			        </div>
			    </div>
			</div>';
			}
			?>

			I would like to make the same thing in a specific category page doing something like this

			<?php
			$postcat = get_the_category();
			if ( $postcat->ID == 'categoryid'){{
			    echo '<div>
			        <p>'text'
			        </p>
			    </div>
			</div>
			</div>';
			}
			?>

			But it doesn't work, i also tried different method like

			<?php if (is_category('categoryname')) : ?>
			<div></div>
			?php endif;?>

			How can i do this?

			Thanks.",
			'2021-04-23 17:08:04',
			"Jean Zay",
			1,
			0
			);


INSERT INTO REPONSES (question, reponse, auteur, date, karma)
VALUES (1, "You can simply tap 'git reset'.", "Gustave Eiffel", '2021-04-16 15:04:23', 1),
		(1, "You should try 'git rm --cached filename' .", "Jean Zay", '2021-04-16 15:27:01', 2);


INSERT INTO KARMA (auteur, question, reponse, date)
VALUES ("Jean Monet", NULL, 1, '2021-04-16 15:47:39'),
		("Jean Monet", NULL, 2, '2021-04-16 15:48:03'),
		("Gustave Eiffel", NULL, 2, '2021-04-16 15:49:00');
