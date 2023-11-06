<?php
include("header.php");
?>
<div class="container p-5">
    <a type="submit" class="btn btn-primary mb-2" href="/vue/inscription.php">Creer Un Compte</a>
</div>
<div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            Se Connecter
        </div>
        <div class="card-body">
            <form action="/controller/validationConnexion.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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