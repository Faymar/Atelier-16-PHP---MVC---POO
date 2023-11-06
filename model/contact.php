<?php
class Contact
{
    private int $idUser;
    private string $nom;
    private string $prenom;
    private string $telephone;
    public function __construct($idUser, $nom, $prenom, $telephone)
    {
        $this->idUser = $idUser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
    }

    public function ajouterContact($pdo)
    {
        $conn = $pdo->connexion();
        $sql = 'INSERT INTO contacts (idUser, nom, prenom, telephone) VALUES (?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->idUser);
        $stmt->bindParam(2, $this->nom);
        $stmt->bindParam(3, $this->prenom);
        $stmt->bindParam(4, $this->telephone);
        $stmt->execute();
    }

    public static function listContact($pdo, $idUser)
    {
        $conn = $pdo->connexion();
        $sql = 'SELECT * FROM contacts WHERE idUser = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idUser);
        $stmt->execute();
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public static function voirContact($pdo, $idContact)
    {
        $conn = $pdo->connexion();
        $sql = 'SELECT * FROM contacts WHERE id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idContact);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contact;
    }

    public static function modifierContact($pdo, $idContact, $nom, $prenom,  $telephone)
    {
        $conn = $pdo->connexion();

        $sql = 'UPDATE contacts SET nom = ?, prenom =?, telephone = ? WHERE id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $telephone);
        $stmt->bindParam(4, $idContact);
        $stmt->execute();

        $conn = null;
    }

    public static function supprimerContact($pdo, $idContact)
    {
        $conn = $pdo->connexion();
        $sql = 'DELETE FROM contacts where id =?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idContact);
        $stmt->execute();

        $conn = null;
    }
    public static function setfav($pdo, $idContact)
    {
        $isfav = 1;
        $conn = $pdo->connexion();
        $sql = 'UPDATE contacts SET estfav = ? WHERE id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $isfav);
        $stmt->bindParam(2, $idContact);
        $stmt->execute();
    }

    public static function deletefav($pdo, $idContact)
    {
        $isfav = 0;
        $conn = $pdo->connexion();
        $sql = 'UPDATE contacts SET estfav = ? WHERE id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $isfav);
        $stmt->bindParam(2, $idContact);
        $stmt->execute();
    }

    public static function voirListeFav($pdo, $idUser)
    {
        $isfav = 1;
        $conn = $pdo->connexion();
        $sql = 'SELECT * FROM contacts WHERE idUser = ? AND estfav =?';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idUser);
        $stmt->bindParam(2, $isfav);
        $stmt->execute();

        $voirListeFav = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $voirListeFav;
    }
}
