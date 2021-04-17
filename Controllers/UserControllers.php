<?php
if(!isset($_SESSION["url"])){
    session_start();   
}

include($_SESSION["url"]. "Models/User.php");


function login($request)
{
    $Dbh = new Dbh();
    $sql = "SELECT * from `users` where email = '" . $request['email'] . "'";
    $result = $Dbh->connect()->query($sql);
    $user = new User();
    while ($row = $result->fetch_assoc()) {
        $user->email = $row["email"];
        $user->password = $row["password"];
    }

    if ($user->password == sha1($request["password"])) {
        $_SESSION["user"] = 1;
        $_SESSION["logged"] = 1;
        header("location:../index.php");
    } else {
        $_SESSION["logged"] = 0;
    }

}

    function logout()
    {
        $_SESSION["user"] = 0;
    }

    function register($request)
    {
        if ($request["password1"] == $request["password2"]) {
            $user = new User();
            $user->email = $request["email"];
            $user->password = sha1($request["password1"]);
            $user->save();
            $_SESSION["user"] = 1;
            header("location:../index.php");
        }
    }
