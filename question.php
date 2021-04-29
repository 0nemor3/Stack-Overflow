<?php session_start();
    require_once('const.php');
?>
<?php
    $link = mysqli_connect(HOST, USER, PASSWORD, BASE);
    $id_question = $_GET['id'];
    $query = "SELECT * FROM QUESTIONS WHERE id = $id_question;";
    $resultlignes = mysqli_query($link, $query);
    $resultquestion = mysqli_fetch_array($resultlignes);
    $titre = $resultquestion['titre'];
    $question = $resultquestion['question'];
    $date = $resultquestion['date'];
    $id_auteur = $resultquestion['auteur'];
    $displayname = $resultquestion['displayname'];
    $nbr_reponses = $resultquestion['reponses'];
    $question_karma = $resultquestion['karma'];
    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="utf-8">
    <title>Stack Overflow</title>
    <meta name="description" content="Posez vos questions et obtenez des réponses.">
    <link rel="icon" type="image/ico" href="img/favicon.ico">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/question.css">
</head>






<body>
	<div class="container">
       <?php require_once('header.php') ?>

       <div class="body">
        <div class="content">
            <div class="top">
                <div class="top__title">
                    <h1>
                        <?php echo html_entity_decode($question); ?>
                    </h1>
                    <button onclick="window.location.href='question_ask.php'">Ask Question</button>
                </div>
                <div class="top__filter">
                    <p class="top__numbers">
                        <?php
                        echo "posted ";
                        echo $date;
                        ?>
                    </p>
                </div>
            </div>
            <div class="question">
                <div class="question__top-left">
                    <button class="question__upvote"></button>
                    <p class="question__karma"></p>
                    <button class="question__downvote"></button>
                </div>
                <div class="question__top-right">
                    <p class="question__text"></p>
                </div>
                <div class="question__bottom">
                    <div class="question__tags">
                        
                    </div>
                    <div class="question__auteur">
                        <div class="profilpic"></div>
                        <p></p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <?php //require_once('footer.php') ?>






    </div>
</body>
</html>