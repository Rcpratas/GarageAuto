<?php

// verifie s'existe erreur de session
$erreur = $_SESSION['erreur'] ?? null;

// vide la session
unset($_SESSION['erreur']);

?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card bg-light p-5 shadow mt-5">

                <h3>Login</h3>

                <hr>

                <form action="?route=login_submit" method="post">
                    <div class="mb-3">
                        <label for="text_user">User</label>
                        <input type="text" name="text_user" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="text_password">Password</label>
                        <input type="password" name="text_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Entrer" class="btn btn-secondary w-100">
                    </div>
                </form>

                <?php if (!empty($erreur)) : ?>
                    <div class="alert alert-danger mt-3 p-2 text-center">
                        <?= $erreur ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>