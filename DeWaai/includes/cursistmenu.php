<nav class="navbar navbar-default navigation-clean-button">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">De Waai</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="cursussen.php">Cursussen</a></li>
                <li role="presentation"><a href="contact.php">Contact</a></li>





            </ul>
            <p class="navbar-text navbar-right actions"> <a class="btn btn-default action-button" role="button" href="functions/logout.php">Logout </a></p>
            <p class="navbar-text navbar-right actions">Welkom
                <?php
                echo $_SESSION['voornaam'];
                ?>
            </p>        </div>
    </div>
</nav>