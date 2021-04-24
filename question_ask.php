<?php session_start();
    require_once('const.php');
?>


<!DOCTYPE html>
<html lang="fr">


	<head>
        <meta charset="utf-8">
        <title>Stack Overflow - Ask</title>
        <meta name="description" content="Posez vos questions et obtenez des réponses.">
        <link rel="icon" type="image/ico" href="img/favicon.ico">
        <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>






<body>
	<div class="container">
	<?php require_once('header.php') ?>

	<div class="body">
        <?php


        $titre = htmlentities("Insert <div> under the header on a specific category page");
        echo $titre;
        
?>
            <code>In my Wordpress website i made this code in header.php that write html under the header only if you are on a specific post (product) page,

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

            Thanks."</code>
            <?php
        echo $question;
        //Connexion à la base de données
                                    $link = mysqli_connect(HOST, USER, PASSWORD, BASE);
                                    /*$query = "SELECT displayname FROM MEMBRES WHERE displayname = '$displayname';";
                                    $resultname = mysqli_query($link, $query);*/
                                    $query = "INSERT INTO QUESTIONS (titre, question, date, auteur, reponses, karma), VALUES ('$titre', '$question', '2021-04-23 17:08:04', 'Jean Zay', 1, 0);";
                                    $result = mysqli_query($link, $query);
                                    mysqli_close($link);
 ?>


    </div>

	<?php require_once('footer.php') ?>






</div>
</body>
</html>