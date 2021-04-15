<?php
session_start();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = 0;
}
if ($_SESSION["user"] == 0) {
    header("location:./login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private page</title>
</head>

<body>
    <?php
    include("./header.php");
    ?>
    <h3 style="text-align: center;">Private information</h3>
</body>

</html>