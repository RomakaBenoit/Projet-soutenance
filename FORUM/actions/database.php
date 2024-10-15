<?php
try{
 //c'est une variable global qui va nous permettre de garder un utilisateur sur chaque page   dans notre site
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Une erreur a étè trouvée : '. $e->getMessage());
}
 