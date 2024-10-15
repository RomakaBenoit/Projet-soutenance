<?php
require('actions/database.php');
//recuperation de toutes les donnees de notre Bdd
$getAllQuestion = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//occupon nous de la recherche ..
if(isset($_GET['seach']) AND !empty($_GET['search'])){
    $usersSearch = $_GET['search'];

    $getAllQuestion = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE"%'.$usersSearch.'%" ORDER BY id DESC LIMIT ');
}
