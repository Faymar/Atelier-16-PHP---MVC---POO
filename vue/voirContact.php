<?php
require('../model/database.php');
require('../model/contact.php');
include("header.php");
$idContact = $_GET["id"];
$contact = Contact::voirContact($pdo, $idContact);
?>
<div class="container p-5">
    <a type="submit" class="btn btn-primary mb-2" href="http://">Retourner</a>
</div>
<div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            Modifier Contact
        </div>
        <div class="card-body">
            <form action="/controller/modifierContact.php" method="post">
                <input type="hidden" name="id" value="<?= $contact['id']; ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" name="nom" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $contact['nom']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prenom</label>
                    <input type="text" name="prenom" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $contact['prenom']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">telephone</label>
                    <input type="tel" name="telephone" class="form-control" id="exampleInputPassword1" value="<?= $contact['telephone']; ?>">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>