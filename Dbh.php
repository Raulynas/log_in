<?php

class Dbh{

    function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kioskas";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error) {
            echo "connection to datebase failed";
            die;
        }
        return $conn;
    }
}


?>