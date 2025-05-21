<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;
class Trainer
{
    /**
     * @var
     */
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $sql = "SELECT * FROM trainers";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM trainers WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $sql = "INSERT INTO trainers (firstName, lastName, description, photo) 
                VALUES (:firstName, :lastName, :description, :photo)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $data['id'] = $id;
        $sql = "UPDATE trainers 
                SET firstName = :firstName, lastName = :lastName, description = :description, photo = :photo 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM trainers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM trainers WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    /**
     * @param $filter_id
     * @param $filter_name
     * @return array
     */
    public function filterTrainers($filter_id, $filter_name) {
        // Base de la requête SQL
        $query = "SELECT * FROM trainers WHERE 1=1";

        // Ajouter des conditions de filtre si elles sont présentes
        if ($filter_id) {
            $query .= " AND id LIKE :filter_id";
        }
        if ($filter_name) {
            $query .= " AND firstName LIKE :filter_name";
        }
        // Préparer et exécuter la requête
        $stmt = $this->db->prepare($query);

        // Lier les paramètres
        if ($filter_id) {
            $stmt->bindValue(':filter_id', '%' . $filter_id . '%');
        }
        if ($filter_name) {
            $stmt->bindValue(':filter_name', '%' . $filter_name . '%');
        }
        $stmt->execute();

        // Retourner les résultats
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM trainers");
        return $stmt->fetch()['total'];
    }
}