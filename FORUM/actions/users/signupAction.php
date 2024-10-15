<?php
session_start(); 

require('actions/database.php');

// Vérifions si la variable post validate existe
if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){

        // On stocke toutes les données qu'on a récupérées dans des variables
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Vérification si un utilisateur est déjà inscrit sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            echo "Utilisateur ajouté avec succès !";
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ? ');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
            
            //recuperon les donnees qui on ete recupere lors de cette requete en haut
            $usersInfos = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');

        } else{
            $errorMsg = "Un utilisateur avec ce pseudo existe déjà....";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
?>
