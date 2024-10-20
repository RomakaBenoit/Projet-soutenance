<?php
    session_start();
     require('actions/questions/showArticleContentAction.php');
     require('actions/questions/postAnswerAction.php');
     require('actions/questions/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>

    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">

      <!-- affichons toutes les donnees de la question  -->
       <?php
            if(isset($errorMsg)){echo $errorMsg;}
        ?>
    <?php
        if(isset($question_publication_date)){
            ?>
            <section class="show-content">
                <h3><?= $question_title; ?> </h3>
                <p><?= $question_content; ?></p>
                <hr> 
                <small><?='<a href="profile.php?id='.$question_id_author.'">' .$question_pseudo_author.'</a> '. $question_publication_date;?></small>
            </section>

            <section class="show-answers">

                <form class="form-group" method="POST">
                    <br>
                    <label for="answer">Réponse: </label><br>
                    <textarea name="answer" class="form-control"></textarea>
                    <br>
                    <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                </form>

                <?php
                  //boucle qui va nous permettre d'afficher toutes les reponses qui ont ete recupere lors de la requete
                    while($answer = $getAllAnswersOfThisQuestion->fetch()){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <?= $answer['pseudo_auteur']; ?>
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu']; ?>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                ?>

            </section>
            <?php
        }
    ?>


    </div>

</body>
</html>