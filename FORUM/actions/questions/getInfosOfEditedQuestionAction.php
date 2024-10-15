<?php
require('actions/database.php');
//verifier si l'id de la question  est bien passe dans url
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfQuestion = $_GET['id'];

    //v erifions si la question existe deja sur le site
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){
        //verification if author of the questions is connected
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_GET['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];

            //remplace toutes les occurences dans une chaine dans notre cas faire disparetre les <br> au vu des utilisateurs
            $question_description = str_replace ('<br/>', '' , $question_description);
            $question_content= str_replace ('<br/>', '' , $question_content);


        }else{
            $errorMsg =  "Vous n'etes pas l'auteur de cette question...";

        }


    }else{
        $errorMsg =  "Aucune question n'a été trouvée...";

    }

}else{
    $errorMsg =  "Aucune question n'a été trouvée...";
}