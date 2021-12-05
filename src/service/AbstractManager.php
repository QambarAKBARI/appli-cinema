<?php

namespace App\Service;

abstract class AbstractManager
{
    private static $connexion;

    /**
     * Retourne une instance de PDO, représentant la connexion à la base de données
     * @return \PDO un objet instance de PDO, connecté à la base de données
     */
    protected static function connect()
    {
        self::$connexion = new \PDO(
            "mysql:dbname=cinema;host=localhost:3306",
            "root",
            "",
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ]
        );
    }

    protected static function executeQuery($sql, $params = null)
    {
        $stmt = self::$connexion->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    protected function getLastInsertId()
    {
        return intval(self::$connexion->lastInsertId());
    }

    protected function getResults($classname, $query, $params = null){
        $results = [];
        $stmt = self::executeQuery($query, $params);
        foreach($stmt->fetchAll() as $data) {
            $results[] = new $classname($data);
        }
        return $results;
    }

    protected function getOneOrNullResult($classname, $query, $params = null){
        $stmt = self::executeQuery($query, $params);
        if($data = $stmt->fetch()) {
            return new $classname($data);
        }
        return null;
    }
}