<?php
if (!isset($_SESSION["url"])) {
    session_start();
}
include("../../Controllers/UserControllers.php");

if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = 0;
}
if ($_SESSION["user"] == 1) {
    header("location:./index.php");
}

$_SESSION["logged"] = -1;
$_SESSION["emailAddress"] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["emailAddress"] = $_POST["email"];
    login($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <?php
    include("../header.php");

    ?>
    <?php

    if ($_SESSION["logged"] == 0) { ?>
        <h2>Wrong password or email address</h2>
    <?php }
    ?>

    <form action="" method="POST">
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Email Address" value="<?= $_SESSION["emailAddress"] ?>"><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" placeholder="Your password"><br><br>
        <input type="submit" value="Log in">

    </form>

</body>

</html>