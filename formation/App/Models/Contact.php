<?php

namespace App\Models;

use App\Core\Database;

class Contact
{
    public static function create($data)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, subject, message) 
                               VALUES (:name, :email, :phone, :subject, :message)");
        return $stmt->execute($data);
    }
}
