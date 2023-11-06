<?php
require('../model/database.php');
require('../model/user.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_email = "/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/";
    $erros = [];

    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }
    if (strlen($_POST['password']) < 8) {
        $erros[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }
    if (
        !preg_match("/[A-Z]/", $_POST['password']) ||
        !preg_match("/[a-z]/", $_POST['password']) ||
        !preg_match("/[0-9]/", $_POST['password'])
    ) {
        $erros[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minusculeet au moins un chiffre.";
    }
    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $stmt = User::seConnecter($pdo, $email, $password);

            if ($stmt->rowCount() > 0) {
                session_start();
                $_SESSION['id'] = $stmt->fetchColumn(0);
                header('location:/vue/listeContacts.php');
            } else {
                echo "Impossible de se connecter";
            }
        } catch (Exception $e) {
            echo 'Erreu: impossible de se connecter' . $e->getMessage();
        }
    }
}
