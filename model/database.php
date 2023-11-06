<?php

class Database
{
    private $dsn;
    private $username;
    private $pass;

    public function __construct($dsn, $username, $pass)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->pass = $pass;
    }
    public  function connexion()
    {
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            die("ERREUR : Impossible de se connecter. " . $e->getMessage());
        }
    }
}

$dsn = 'mysql:host=localhost;dbname=gestionContacts';
$username = 'root';
$pass = 'root';

$pdo = new Database($dsn, $username, $pass);
