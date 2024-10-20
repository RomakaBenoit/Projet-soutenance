<?php
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    //verivions si un utilisateur utilise un deja un ID
    $idOfUser = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ? ORDER BY id DESC');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){

        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];
        //Recuperer toutes les questions publiees par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT question, date_publication FROM questions WHERE id_auteur = ?');
        $getHisQuestions->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvé...";
    }
    

}else{
    $errorMsg = "Aucun utilisateur trouvé...";
}
