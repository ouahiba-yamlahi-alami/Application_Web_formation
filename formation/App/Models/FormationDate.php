<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class FormationDate extends Database
{
    /**
     * @param $formation_id
     * @return array
     */
    public function getByFormationId($formation_id)
    {
        return $this->query("SELECT * FROM formationDate WHERE formation_id = :formation_id", ['formation_id' => $formation_id]);
    }

    /**
     * @param $data
     * @return false|string
     */
    public function create($data)
    {
        $sql = "INSERT INTO formationDate (date, formation_id) VALUES (:date, :formation_id)";
        return $this->execute($sql, $data);
    }

    /**
     * @param $formation_id
     * @return false|string
     */
    public function deleteByFormationId($formation_id)
    {
        return $this->execute("DELETE FROM formationDate WHERE formation_id = :formation_id", ['formation_id' => $formation_id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT COUNT(*) as total FROM formationDate");
        return $stmt->fetch()['total'];
    }
}
