<?php
// config/Database.php
class Database
{
    private $host = 'localhost';
    private $db_name = 'ghoul_system';
    private $username = 'login-php';
    private $password = 'CCG_login.php';
    public $PDO;

    public function getConnection()
    {
        $this->PDO = null;
        try {
            $this->PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->PDO;
    }
}
