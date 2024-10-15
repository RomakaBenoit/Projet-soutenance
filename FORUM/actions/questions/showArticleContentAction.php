<?php

require('actions/database.php');
//verifier si id de la publication est rentree dans url
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfTheQuestion = $_GET['id'];

    //verifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id= ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        //recuperer toutes les datas de la question
        $questionsInfos =  $checkIfQuestionExists->fetch();

        //stoker les datas de la question dans des variables  propres
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

        
    }else{
        $errorMsg = "Aucune question n'a été trouvée.. ";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée.. ";
}