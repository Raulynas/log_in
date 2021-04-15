<?php
if (isset($_GET["logout"])) {
    session_start();
    $_SESSION["user"] = 0;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <?php
    include("./header.php");
    ?>
    <h3 style="text-align: center;">Home page</h3>
</body>

</html>