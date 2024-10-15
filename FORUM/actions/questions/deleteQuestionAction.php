<?php
session_start();
//verifions si l'utilisateur est bien connecte
if(!isset($_SESSION['auth'])){
    header('Locaton: ../../login.php');
}

require('../database.php');

//verifions si la question qu'on veux supprime est bien passe dans url
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];

    $chesckIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $chesckIfQuestionExists->execute(array($idOfTheQuestion));

    if($chesckIfQuestionExists->rowCount() > 0){

        //verifions si l'utilisateur connecté est l'auteur de la question
        $questionsInfos = $chesckIfQuestionExists->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){

            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ../../my-questions.php');

        }else{
            echo"vous n'avez pas le droit de supprimer une question qui ne vous appartient pas !";
        }
    }else{
    echo "Aucune  question n'a été trouvée...";

}
}else{
    echo "Aucune question n'a été trouvée...";
}