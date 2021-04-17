<?php
include("Dbh.php");
class User
{

    private $id;
    private $email;
    private $password;

    function __construct()
    {
    }

    public function save()
    {
        $Dbh = new Dbh();
        $sql = "INSERT
        INTO `users` (`id`, `email`, `password`)
        VALUES (NULL, '" . $this->email . "', '" . $this->password . "');";
        $Dbh->connect()->query($sql);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
