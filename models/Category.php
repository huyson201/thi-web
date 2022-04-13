<?php

class Category extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = self::$connection->prepare($sql);
        return $this->execute($stmt);
    }
}
