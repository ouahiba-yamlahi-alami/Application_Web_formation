<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class City
{
    /**
     * @var PDO
     */
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @return array
     */
    public function all(): array {
        $stmt = $this->db->query("SELECT * FROM cities ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function find(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM cities WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * @param $name
     * @param $country_id
     * @return bool
     */
    public function create($name, $country_id) {
        $stmt = $this->db->prepare("INSERT INTO cities (name, country_id) VALUES (?, ?)");
        return $stmt->execute([$name, $country_id]);
    }

    /**
     * @param int $id
     * @param string $name
     * @return bool
     */
    public function update(int $id, string $name): bool {
        $stmt = $this->db->prepare("UPDATE cities SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM cities WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return int
     */
    public function count(): int {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM cities");
        return (int) $stmt->fetch()['total'];
    }

    /**
     * @param string|null $filter_id
     * @param string|null $filter_name
     * @param string|null $filter_country_id
     * @param string|null $filter_country_name
     * @return array
     */
    public function filter(
        ?string $filter_id = null,
        ?string $filter_name = null,
        ?string $filter_country_id = null,
        ?string $filter_country_name = null
    ): array {
        $query = "SELECT cities.*, countries.name AS country_name 
              FROM cities 
              INNER JOIN countries ON cities.country_id = countries.id 
              WHERE 1=1";

        $params = [];

        if (!empty($filter_id)) {
            $query .= " AND cities.id LIKE :filter_id";
            $params[':filter_id'] = '%' . $filter_id . '%';
        }

        if (!empty($filter_name)) {
            $query .= " AND cities.name LIKE :filter_name";
            $params[':filter_name'] = '%' . $filter_name . '%';
        }

        if (!empty($filter_country_id)) {
            $query .= " AND cities.country_id LIKE :filter_country_id";
            $params[':filter_country_id'] = '%' . $filter_country_id . '%';
        }

        if (!empty($filter_country_name)) {
            $query .= " AND countries.name LIKE :filter_country_name";
            $params[':filter_country_name'] = '%' . $filter_country_name . '%';
        }

        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
