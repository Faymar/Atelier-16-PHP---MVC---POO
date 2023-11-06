<?php

session_start();
if (isset($_SESSION['id'])) {
    require('../model/database.php');
    require('../model/contact.php');
    include("header.php");
    $idUser = $_SESSION["id"];
    $contacts = Contact::listContact($pdo, $idUser);
?>
    <div class="container p-5 d-flex align-items-center justify-content-center">
        <div id="right_panel">
            <div class="wrap-table">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" class="sticky-col">Contact</th>
                            <th scope="col">telephon</th>
                            <th scope="col">Ajouter fav</th>
                            <th scope="col">Modifer</th>
                            <th scope="col" class="sticky-col sticky-col-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($contacts as $contact) {
                        ?>
                            <tr>
                                <td class="sticky-col" scope="row" data-label="Customer">
                                    <div class="user__info">
                                        <label>
                                            <?php
                                            if ($contact['estfav'] == true) { ?>
                                                <div class="user__badge">Favori</div>
                                            <?php }
                                            ?>
                                        </label>
                                        <i class="fas fa-address-card"></i>
                                        <div>
                                            <div class="user__name"><?= $contact['nom'] ?></div>
                                            <div class="user__email"><?= $contact['prenom'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Enrolled"><b><?= $contact['telephone'] ?></b></td>
                                <td data-label="Actions" class="sticky-col sticky-col-right">
                                    <?php
                                    if ($contact['estfav'] == false) { ?>
                                        <a href="/controller/ajouterfav.php/?id=<?= $contact['id'] ?>" class="user__edit  bg-primary">ajouter favori</a>
                                    <?php } else { ?>
                                        <a href="/controller/supprimerfav.php/?id=<?= $contact['id'] ?>" class="user__edit  bg-warning">Supprimer favori</a>
                                    <?php }
                                    ?>
                                </td>
                                <td data-label="Actions" class="sticky-col sticky-col-right">
                                    <a href="/vue/voirContact.php/?id=<?= $contact['id'] ?>" class="user__edit bg-success">modifier</a>
                                </td>
                                <td data-label="Actions" class="sticky-col sticky-col-right">
                                    <a href="/controller/supprimerContact.php/?id=<?= $contact['id'] ?>" class="user__edit bg-danger">supprimer</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button id="btn_resize">
                <span></span>
            </button>
        </div>
    </div>
    <script src="script.js"></script>

<?php } else {
    header('Location: /vue/connexion.php');
} ?>