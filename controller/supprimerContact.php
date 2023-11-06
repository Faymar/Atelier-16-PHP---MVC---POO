<?php
require('../model/database.php');
require('../model/contact.php');
$idContact =  $_GET["id"];
try {
    Contact::supprimerContact($pdo, $idContact);
    header('location:/vue/listeContacts.php');
} catch (Exception $e) {
    echo 'Erreur: Impossible de supprimer le contact';
}
