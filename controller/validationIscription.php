<!-- nom	email	password	
 -->
<?php
require('../model/database.php');
require('../model/user.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_nom = "/^[a-zA-Z ']{2,}$/";
    // $regex_prenom = "/^[a-zA-Z ']{3,}$/";
    // $regex_tel = "/^7+[0-9]{1,9}$/";
    $regex_email = "/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/";
    $erros = [];

    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }

    if (strlen($_POST["password"]) < 8) {
        $erros[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (
        !preg_match("/[A-Z]/", $_POST["password"]) ||
        !preg_match("/[a-z]/", $_POST["password"]) ||
        !preg_match("/[0-9]/", $_POST["password"])
    ) {
        $erros[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minusculeet au moins un chiffre.";
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
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        try {
            $user = new User($nom, $email, $password);
            $user->inscription($pdo);

            header('location:/vue/listeContacts.php');
        } catch (Exception $e) {
            echo 'Erreur de donnees' . $e->getMessage();
        }
    }
}
?>