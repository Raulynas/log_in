<?php
include("./User.php");

session_start();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = 0;
}

if ($_SESSION["user"] == 1) {
    header("location:./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password1"] == $_POST["password2"]) {
        $user = new User();
        $user->email = $_POST["email"];
        $user->password = sha1($_POST["password1"]);
        $user->save();
        $_SESSION["user"] = 1;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    include("./header.php");
    ?>

    <form action="#" method="POST">
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Email Address"><br><br>
        <label for="password">New password</label><br>
        <input type="password" id="password" name="password1" placeholder="Your password"><br><br>
        <label for="password">Repeat your password</label><br>
        <input type="password" id="password" name="password2" placeholder="Your password"><br><br>
        <input type="submit" value="Register">

    </form>
</body>

</html>