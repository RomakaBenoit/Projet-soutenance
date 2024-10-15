<?php
session_start(); 

require('actions/database.php');


// Vérifions si la variable post validate existe
if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo'])  && !empty($_POST['password'])){

        // On stocke toutes les données qu'on a récupérées dans des variables
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);
        //verifiier si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() >0){

             //Recuperer les donnees de l'utilisateur 
             $usersInfos = $checkIfUserExists->fetch();

             //verifiier si le mdp est correcte
             if(password_verify($user_password, $usersInfos['mdp'])){

                
                 
                //recuperon les donnees qui on ete recupere lors de cette requete en haut
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Rediriger l'utilisateur vers la page d'acceuil
                header('Location: index.php');

            }else{

                $errorMsg = "votre mots de passe est incorrecte...";

            }
        }else {
            $errorMsg = "votre pseudo est incorrecte...";
        }

    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
?>
