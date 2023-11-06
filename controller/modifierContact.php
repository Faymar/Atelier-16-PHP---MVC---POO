<?php
require('../model/database.php');
require('../model/contact.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_nom = "/^[a-zA-Z ']{2,}$/";
    $regex_prenom = "/^[a-zA-Z ']{3,}$/";
    $regex_tel = "/^7+[0-9]{1,9}$/";
    $erros = [];

    if (empty($_POST["prenom"])) {
        $erros[] =  "Le prenom est obligatoire.";
    }
    if (!preg_match($regex_prenom, $_POST["prenom"])) {
        $erros[] = "Le prenom est invalide.";
    }

    if (empty($_POST["nom"])) {
        $erros[] =  "Le nom est obligatoire.";
    }
    if (!preg_match($regex_nom, $_POST["nom"])) {
        $erros[] = "Le nom est invalide.";
    }

    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $idContact = $_POST["id"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];

        try {
            Contact::modifierContact($pdo, $idContact, $nom, $prenom,  $telephone);
            header('location:/vue/listeContacts.php');
        } catch (Exception $e) {
            echo 'Erreur: Impossible de modifier le contact';
        }
    }
}
