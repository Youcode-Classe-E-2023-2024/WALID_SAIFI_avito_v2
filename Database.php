
<?php
class Database
{
    private  $host = "localhost";
    private  $username = "root";
    private  $password = "";
    private  $db_name = "db_anonce_v2";
    private  $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    }
    public function getConnection()
    {
        return $this->conn;
    }
}


