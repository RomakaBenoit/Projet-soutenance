<?php
    require('actions/users/securityAction.php'); 
    require('actions/questions/myQuestionsAction.php'); 
 ?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php' ?>
        <br><br>
    <div class="container">
    <?php
        //affichage  de toutes les questions de l'utilisateur dans une cart en boots.
        while($question = $getAllMyQuestion->fetch()){
            ?>
            <i><div class="card">
                <h4 class="card-header">
                <a href="article.php?id=<?= $question['id']; ?>">
                        <?=  $question['titre'];?>
                    </div>
                    <?= $question['titre']; ?></i>
                </h4>
                <div class="card-body">
                    <p class="card-text">
                        <?= $question['description'];?>
                    </p><br><br>
                    <a href="article.php?id=<?=$question['id'];?>" class="btn btn-primary">Accéder à la question</a>
                    <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question la question</a>

                </div>
                 
            </div>
            <br>
            <?php
        }   
    ?>
    </div>
</body>
</html>