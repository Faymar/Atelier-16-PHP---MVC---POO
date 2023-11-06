<?php
require('../model/database.php');
require('../model/contact.php');
$idContact =  $_GET["id"];
try {
    Contact::setfav($pdo, $idContact);
    header('location:/vue/listeContacts.php');
} catch (Exception $e) {
    echo 'Erreur: Impossible d\'ajouter au favori le contact';
}
