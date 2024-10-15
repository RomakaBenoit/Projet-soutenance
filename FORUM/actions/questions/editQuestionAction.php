<?php

require('actions/database.php');

//verification si utilisateur clic sur le bouton de validation
if(isset($_POST['validate'])){

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        //mettre a jours les informations dans notre table
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content,   $idOfQuestion));

        //redirigeons l'utilisateur vers la page des question de l'utilisateur
        header('Location:  my-questions.php');
    }else{
        $errorMsg = "veuillez compléter tous les champs...";
    }
} 