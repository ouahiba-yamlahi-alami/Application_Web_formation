<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Formation extends Database
{
    /**
     * @var PDO
     */
    private $db;

    /**
     *
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT 
                f.*, 
                c.name AS course_name, 
                ci.name AS city_name, 
                CONCAT(t.firstName, ' ', t.lastName) AS trainer_name,
                s.logo AS subject_logo,
                s.id AS subject_id,
                s.name AS subject_name,
                d.id AS domain_id,
                d.name AS domain_name
            FROM formations f
            JOIN courses c ON f.course_id = c.id
            JOIN subjects s ON c.subject_id = s.id
            JOIN domain d ON s.domain_id = d.id
            JOIN cities ci ON f.city_id = ci.id
            JOIN trainers t ON f.trainer_id = t.id";

        return $this->query($sql);
    }

    /**
     * @param $data
     * @return false|string
     */
    public function create($data)
    {
        $sql = "INSERT INTO formations (price, mode, course_id, city_id, trainer_id)
                VALUES (:price, :mode, :course_id, :city_id, :trainer_id)";
        return $this->execute($sql, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->queryOne("SELECT * FROM formations WHERE id = :id", ['id' => $id]);
    }

    /**
     * @param $id
     * @param $data
     * @return false|string
     */
    public function update($id, $data)
    {
        $data['id'] = $id;
        $sql = "UPDATE formations SET price = :price, mode = :mode, course_id = :course_id, city_id = :city_id, trainer_id = :trainer_id WHERE id = :id";
        return $this->execute($sql, $data);
    }

    /**
     * @param $id
     * @return false|string
     */
    public function delete($id)
    {
        return $this->execute("DELETE FROM formations WHERE id = :id", ['id' => $id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM countries");
        return $stmt->fetch()['total'];
    }

    /**
     * @param array $filters
     * @return array
     */
    public function filter(array $filters)
    {
        $sql = "SELECT 
                f.*, 
                c.name AS course_name, 
                ci.name AS city_name, 
                CONCAT(t.firstName, ' ', t.lastName) AS trainer_name,
                s.logo AS subject_logo,
                s.id AS subject_id,
                s.name AS subject_name,
                d.id AS domain_id,
                d.name AS domain_name
            FROM formations f
            JOIN courses c ON f.course_id = c.id
            JOIN subjects s ON c.subject_id = s.id
            JOIN domain d ON s.domain_id = d.id
            JOIN cities ci ON f.city_id = ci.id
            JOIN trainers t ON f.trainer_id = t.id
            WHERE 1=1";

        $params = [];

        if (!empty($filters['price'])) {
            $sql .= " AND f.price = :price";
            $params['price'] = $filters['price'];
        }

        if (!empty($filters['mode'])) {
            $sql .= " AND f.mode = :mode";
            $params['mode'] = $filters['mode'];
        }

        if (!empty($filters['course_id'])) {
            $sql .= " AND f.course_id = :course_id";
            $params['course_id'] = $filters['course_id'];
        }

        if (!empty($filters['city_id'])) {
            $sql .= " AND f.city_id = :city_id";
            $params['city_id'] = $filters['city_id'];
        }

        if (!empty($filters['trainer_id'])) {
            $sql .= " AND f.trainer_id = :trainer_id";
            $params['trainer_id'] = $filters['trainer_id'];
        }

        return $this->query($sql, $params);
    }
}
