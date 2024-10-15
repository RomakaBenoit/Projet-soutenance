<?php
session_start();

require('actions/database.php');

//recuperation de tous les questions de l'utilisateur connecter
$getAllMyQuestion = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
//on passe en parametre id de l'utillisateur connecter .
$getAllMyQuestion->execute(array($_SESSION['id'])); 