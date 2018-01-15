<style>
    .btn-info {
        background-color: #f76511 ;
    }
</style>


<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-expand-sm" role="navigation">
    <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="nav navbar-nav navbar-left">
            <li><a class="nav-link" href="index.php">Startseite</a></li>
            <li><a class="nav-link" href="registrierungsFormular.php">Registrierung</a></li>
            <li class="dropdown">
                <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                            Social Media
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link"href="instagram.php">Instagram</a></li>
                    <li><a class="nav-link"href="twitter.php">Twitter </a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                            Wochen
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link"href="woche1.php">1. Woche</a></li>
                    <li><a class="nav-link"href="woche2.php">2. Woche </a></li>

                </ul>
            </li>

    <?php
        if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    ?>
            <li><a class="nav-link" href="logout.php">Ausloggen</a></li>
    <?php
        } else {
            ?>
            <li class="dropdown">
                <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    Login
                </a>
                <ul class="dropdown-menu">
                    <form action="login.php" method="post">
                        Username:<br/>
                        <input type="text" name="username" required="required"
                               value="<?php echo $submitted_username; ?>"/>
                        <br/><br/>
                        Password:<br/>
                        <input type="password" name="password" required="required" value=""/>
                        <br/><br/>
                        <input type="submit" class="btn btn-info" value="Login"/>
                    </form>


                </ul>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
</nav>