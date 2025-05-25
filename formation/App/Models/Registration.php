<?php

namespace App\Models;

use App\Core\Database;

class Registration
{
    public static function create($data)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO registrations (firstName, lastName, phone, email, company, paid, formation_id) 
                               VALUES (:firstName, :lastName, :phone, :email, :company, :paid, :formation_id)");
        return $stmt->execute($data);
    }
}
