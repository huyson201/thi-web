<?php
class Db
{
    public static $connection;
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'web';

    public function __construct()
    {
        if (self::$connection || isset(self::$connection)) return;
        self::$connection = new mysqli($this->host, $this->username, $this->password, $this->dbname) or die("connect failure!");
    }

    public function execute($stmt)
    {
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
