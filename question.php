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

$query = "SELECT *FROM MEMBRES WHERE id = $id_auteur;";
$resultlignes = mysqli_query($link, $query);
$resultauteur = mysqli_fetch_array($resultlignes);
$profilpic_auteur = $resultauteur['profilpic'];
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="utf-8">
    <title>Stack Overflow</title>
    <meta name="description" content="Posez vos questions et obtenez des réponses.">
    <?php require_once('css_inclusion.php'); ?>
    <link rel="stylesheet" type="text/css" href="CSS/question.css">
</head>






<body>
	<div class="container">
     <?php require_once('header.php') ?>

     <div class="body">
        <div class="content">
            <div class="content__question">
                <div class="question__top"></div>
                <div class="question__titre">
                    <?php echo "<h1>" . html_entity_decode($titre) . "</h1>"; ?>
                </div>
                <div class="question__ask">
                    <button>Ask Question</button>
                </div>
                <div class="question__date">
                    <?php echo "Question posée le " . $date; ?>
                </div>
                <div class="question__filler-1"></div>
                <div class="question__upvote">
                    <button><i class="fas fa-angle-up"></i></button>
                </div>
                <div class="question__karma">
                    <?php echo $question_karma; ?>
                </div>
                <div class="question__downvote">
                    <button><i class="fas fa-angle-down"></i></button>
                </div>
                <div class="question__text">
                    <?php echo html_entity_decode($question); ?>
                </div>
                <div class="question__filler-2"></div>
                <div class="question__filler-3"></div>
                <div class="question__tags">
                    <button>Git</button>
                    <button>Git Add</button>
                </div>
                <div class="question__filler-4"></div>
                <div class="question__auteur">
                    <div class="qauteur__top-fill"></div>
                    <div class="qauteur__left-fill"></div>
                    <div class="qauteur__rond">
                        <div class="qauteur__date">
                            <?php echo "posée le " . $date; ?>
                        </div>
                        <div class="qauteur__profilpic"><img src="<?php echo $profilpic_auteur; ?>" alt="pic"></div>
                        <div class="qauteur__auteur"><?php echo '<a href="user.php?id='. urlencode($id_auteur).'">' . $displayname . '</a>'; ?></div>
                    </div>
                    <div class="qauteur__right-fill"></div>
                    <div class="qauteur__bottom-fill"></div>
                </div>
                <div class="question__reponse-nbr">
                    <?php echo $nbr_reponses . ' Réponses'; ?>
                </div>
            </div>
            <?php
            if ($nbr_reponses != 0) {
                $link = mysqli_connect(HOST, USER, PASSWORD, BASE);
                $query = "SELECT * FROM REPONSES WHERE question = $id_question;";
                $resultreponses = mysqli_query($link, $query);
                while ($repline = mysqli_fetch_array($resultreponses)) {
                    $reponse = $repline['reponse'];
                    $id_reponse_auteur = $repline['auteur'];
                    $reponse_auteur_displayname = $repline['displayname'];
                    $date_reponse = $repline['date'];
                    $karma_reponse = $repline['karma'];

                    $query = "SELECT profilpic FROM MEMBRES WHERE id = $id_reponse_auteur;";
                    $result_reponses_auteur = mysqli_query($link, $query);
                    $resultline_rep_auteur = mysqli_fetch_array($result_reponses_auteur);
                    $reponse_profilpic = $resultline_rep_auteur['profilpic'];
                    ?>
                    <div class="content__reponse">
                        <div class="reponse__upvote">
                            <button><i class="fas fa-angle-up"></i></button>
                        </div>
                        <div class="reponse__karma">
                            <?php echo $karma_reponse; ?>
                        </div>
                        <div class="reponse__downvote">
                            <button><i class="fas fa-angle-down"></i></button>
                        </div>
                        <div class="reponse__texte">
                            <?php echo html_entity_decode($reponse); ?>
                        </div>
                        <div class="reponse__auteur">
                            <div class="rauteur__top-fill"></div>
                            <div class="rauteur__left-fill"></div>
                            <div class="rauteur__rond">
                                <div class="rauteur__date">
                                    <?php echo "postée le " . $date_reponse; ?>
                                </div>
                                <div class="rauteur__profilpic"><img src="<?php echo $reponse_profilpic; ?>" alt="pic"></div>
                                <div class="rauteur__auteur"><?php echo '<a href="user.php?id='. urlencode($id_reponse_auteur).'">' . $reponse_auteur_displayname . '</a>'; ?></div>
                            </div>
                            <div class="rauteur__right-fill"></div>
                            <div class="rauteur__bottom-fill"></div>
                        </div>
                    </div>
                    <?php
                }
                mysqli_close($link);
            }
            ?>
        </div>
    </div>
    <?php require_once('footer.php') ?>






</div>
</body>
</html>