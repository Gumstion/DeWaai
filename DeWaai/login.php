<?php
    include 'includes/header.php';
?>
    <!--Loginformulier-->
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" required="" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="wachtwoord" required="" placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Inloggen </button>
            </div><a href="registreren.php" class="forgot">Nog geen account? Meld je nu aan!</a></form>
    </div>

<?php
    include 'includes/footer.php';
?>