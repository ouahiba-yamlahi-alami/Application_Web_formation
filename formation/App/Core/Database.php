<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    public static function connect(): PDO
    {
        if (self::$pdo === null) {
            $host = 'db';
            $db   = 'formation_db';
            $user = 'formation_user';
            $pass = 'formation_pass';

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }

    public function query($sql, $params = [])
    {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, $params = [])
    {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return self::$pdo->lastInsertId();
    }
    public static function getInstance(): PDO
    {
        return self::connect();
    }
}
