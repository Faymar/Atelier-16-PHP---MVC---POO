<?php
session_start();
if (isset($_SESSION['id'])) {
    include("header.php");
?>
    <div class="container p-5">
        <div class="card">
            <div class="card-header bg-primary text-light">
                Ajouter Contact
            </div>
            <div class="card-body">
                <form action="/controller/ajouterContact.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" name="nom" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter le nom">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Prenom</label>
                        <input type="text" name="prenom" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter le prenom">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">telephone</label>
                        <input type="tel" name="telephone" class="form-control" id="exampleInputPassword1" placeholder="Enter le numero de telephone">
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
<?php } else {
    header('Location: /vue/connexion.php');
} ?>