<?php
$host = 'db';
$db   = 'formation_db';
$user = 'formation_user';
$pass = 'formation_pass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
