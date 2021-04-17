<div class="header">
    <div class="menu">
        <a href="../index.php">Home</a>
        <?php


        $baseUrl = "http://" .  $_SERVER["SERVER_NAME"] . "/" . explode("/", $_SERVER["REQUEST_URI"])[1] . "/" . explode("/", $_SERVER["REQUEST_URI"])[2];

        if (!isset($_SESSION["user"])) {
            session_start();
        }
        if (!isset($_SESSION["user"])) {
            $_SESSION["user"] = 0;
        }

        if ($_SESSION["user"] == 1) { ?>
            <a href="./private.php">Private Area</a>
            <a href=<?= $baseUrl . "/views/index.php?logout=1" ?>>Log out</a>
        <?php } ?>
        <?php
        if ($_SESSION["user"] != 1) { ?>
            <a href=<?= $baseUrl . "/views/auth/login.php" ?>>LogIn</a>
            <a href=<?= $baseUrl . "/views/auth/register.php" ?>>Register</a>
        <?php } ?>
    </div>
</div>


<style>
    .header {
        height: 50px;
        width: 100%;
        background-color: lightgrey;
    }

    .menu {
        margin: 20px;
        float: right;
    }

    .menu>a {
        padding: 5px 20px;

        border: solid 1px grey;
        border-radius: 3px;
        color: limegreen;
        text-decoration: none;
        background-color: white;
    }
</style>