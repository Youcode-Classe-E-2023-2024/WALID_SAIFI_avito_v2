<?php
class User
{
    public $username;
    public $password;
    public $id_role;
    public $nom;
    public $prenom;

    public function __construct( $username, $password, $id_role, $nom, $prenom)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id_role = $id_role;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIdRole()
    {
        return $this->id_role;
    }

    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
    }



public function addUserToDatabase()
{
    $db = new Database();
    $conn = $db->getConnection();
    $sql = "INSERT INTO users (username, password, id_role,nom,prenom) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $this->username, $this->password, $this->id_role,$this->nom,$this->prenom);

    if ($stmt->execute()) {
        // User added successfully
        $conn->close();
        return true;
    } else {
        // Error occurred while adding user
        $conn->close();
        return false;
    }
}

}




?>
