<?php

//verifion si un utilisateur est connecter
if(!isset($_SESSION['auth'])){
    header('Lacation: login.php');
}