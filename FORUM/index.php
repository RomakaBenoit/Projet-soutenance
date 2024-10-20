<?php
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form mrthod="GET">
            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search"  class="form-control">
                </div>
                <div class="col-4"> 
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <!-- affichon notre question au niveau de la barre de recherche -->
        <?php
            while($question =  $getAllQuestion->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?= $question['id']; ?>">
                        <?=  $question['titre'];?>
                    </div>
                    <div class="card-body">
                        <?=  $question['description'];?>

                    </div>
                    <div class="card-footer">
                        <h6>Publié par <a href="profile.php?id=<?=  $question['id_auteur'];?>"><?=  $question['pseudo_auteur'];?></a> le <?=  $question['date_publication'];?></h6>

                    </div>
                </div>
                <br>
                <?php

            }
        ?>

    </div>
</body>
</html>