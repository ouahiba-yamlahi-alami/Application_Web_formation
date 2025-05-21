<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Subject
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
    public function filterSubject($filter_id, $filter_name)
    {
        $query = "SELECT subjects.*, domain.name AS domain_name
              FROM subjects
              JOIN domain ON subjects.domain_id = domain.id
              WHERE 1=1";

        if ($filter_id) {
            $query .= " AND subjects.id LIKE :filter_id";
        }
        if ($filter_name) {
            $query .= " AND subjects.name LIKE :filter_name";
        }

        $stmt = $this->db->prepare($query);

        if ($filter_id) {
            $stmt->bindValue(':filter_id', '%' . $filter_id . '%');
        }
        if ($filter_name) {
            $stmt->bindValue(':filter_name', '%' . $filter_name . '%');
        }

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function all()
    {
        $stmt = $this->db->query("SELECT subjects.*, domain.name as domain_name FROM subjects 
                                  JOIN domain ON subjects.domain_id = domain.id");
        return $stmt->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM subjects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        $sql = "INSERT INTO subjects (name, shortDescription, longDescription, individualBenefit, businessBenefit, logo, domain_id)
                VALUES (:name, :shortDescription, :longDescription, :individualBenefit, :businessBenefit, :logo, :domain_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        $sql = "UPDATE subjects SET 
                name = :name,
                shortDescription = :shortDescription,
                longDescription = :longDescription,
                individualBenefit = :individualBenefit,
                businessBenefit = :businessBenefit,
                domain_id = :domain_id";

        if (isset($data['logo'])) {
            $sql .= ", logo = :logo";
        }

        $sql .= " WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':shortDescription', $data['shortDescription']);
        $stmt->bindValue(':longDescription', $data['longDescription']);
        $stmt->bindValue(':individualBenefit', $data['individualBenefit']);
        $stmt->bindValue(':businessBenefit', $data['businessBenefit']);
        $stmt->bindValue(':domain_id', $data['domain_id']);
        if (isset($data['logo'])) {
            $stmt->bindValue(':logo', $data['logo']);
        }
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM subjects WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM subjects");
        return $stmt->fetch()['total'];
    }
}