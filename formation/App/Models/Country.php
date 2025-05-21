<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Country
{
    /**
     * @var PDO
     */
    private PDO $db;

    /**
     *
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @param $filter_id
     * @param $filter_name
     * @return array
     */
    public function filterCountries($filter_id, $filter_name) {
        // Base de la requête SQL
        $query = "SELECT * FROM countries WHERE 1=1";

        // Ajouter des conditions de filtre si elles sont présentes
        if ($filter_id) {
            $query .= " AND id LIKE :filter_id";
        }
        if ($filter_name) {
            $query .= " AND name LIKE :filter_name";
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
     * @return array
     */
    public function all() {
        $stmt = $this->db->query("SELECT * FROM countries");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM countries WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $name
     * @return bool
     */
    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO countries (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    /**
     * @param $id
     * @param $name
     * @return bool
     */
    public function update($id, $name) {
        $stmt = $this->db->prepare("UPDATE countries SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM countries WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM countries");
        return $stmt->fetch()['total'];
    }
}