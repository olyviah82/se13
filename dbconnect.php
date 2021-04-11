<?php
include_once './util.php';
$servername = "localhost";
$username = "root";
$password = "";
class DBConnector
{

    protected $pdo;
    function __construct()
    {
        $dsn = "mysql:host=" . Util::$SERVER_NAME . ";dbname=" . Util::$DB_NAME . "";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->pdo = new PDO($dsn, Util::$DB_USER, Util::$DB_USER_PASS, $options);
        } catch (PDOException $e) {
            echo "CONNECTION FAILED:" . $e->getMessage();
        }
    }
    public function connectToDB()
    {
        return $this->pdo;
    }
    public function closeDB()
    {
        $this->pdo = null;
    }
}
