<?php
class User
{
    private string $nom;
    private string $email;
    private string $password;

    public function __construct($nom, $email, $password)
    {
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function inscription($pdo)
    {
        $conn = $pdo->connexion();
        $sql = 'INSERT INTO `users` (nom, email, `password`) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);

        $this->password = md5($this->password);

        $stmt->bindParam(1, $this->nom);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->password);
        $stmt->execute();
        $id = $conn->lastInsertId();

        $_SESSION['id'] = $id;
    }

    public static function seConnecter($pdo, $email, $password)
    {
        $conn = $pdo->connexion();
        $passwordHash = md5($password);
        $sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $passwordHash);

        $stmt->execute();
        return $stmt;
    }
}
