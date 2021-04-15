<?php

include("./User.php");
$logged = -1;

session_start();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = 0;
}
if ($_SESSION["user"] == 1) {
    header("location:./index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Dbh = new Dbh();
    $sql = "SELECT * from `users` where email = '" . $_POST['email'] . "'";
    $result = $Dbh->connect()->query($sql);

    $user = new User();
    while ($row = $result->fetch_assoc()) {
        $user->email = $row["email"];
        $user->password = $row["password"];
    }
    $logged = 0;
    if ($user->password == sha1($_POST["password"])) {
        $_SESSION["user"] = 1;
        $logged = 1;
        header("location:./index.php");
    }
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
    include("./header.php");

    ?>
    <?php

    if ($logged == 0) { ?>
        <h2>Wrong password or email address</h2>
    <?php }
    ?>

    <form action="" method="POST">
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Email Address"><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" placeholder="Your password"><br><br>
        <input type="submit" value="Log in">

    </form>

</body>

</html>