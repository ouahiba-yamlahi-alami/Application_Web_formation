<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Domaine
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
     * @return array
     */
    public static function getAll() {
        $db = Database::getInstance();
        return $db->query("SELECT * FROM domain")->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * @param $filter_id
     * @param $filter_name
     * @return array
     */
    public function filterDomaines($filter_id, $filter_name) {
        $query = "SELECT * FROM domain WHERE 1=1";

        if ($filter_id) {
            $query .= " AND id LIKE :filter_id";
        }
        if ($filter_name) {
            $query .= " AND name LIKE :filter_name";
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
    public function all() {
        $stmt = $this->db->query("SELECT * FROM domain");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM domain WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $name
     * @param $description
     * @return bool
     */
    public function create($name, $description) {
        $stmt = $this->db->prepare("INSERT INTO domain (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $description]);
    }

    /**
     * @param $id
     * @param $name
     * @param $description
     * @return bool
     */
    public function update($id, $name, $description) {
        $stmt = $this->db->prepare("UPDATE domain SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM domain WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * @return mixed
     */
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM domain");
        return $stmt->fetch()['total'];
    }

    /**
     * Get all domains with additional display information
     *
     * @return array
     */
    public static function getAllWithDisplayInfo() {
        $domains = self::getAll();
        $domainsWithInfo = [];

        foreach ($domains as $domain) {
            // Add display information like image path
            $domain['image_path'] = self::getDomainImagePath($domain['name']);
            // Add URL-safe slug
            $domain['slug'] = urlencode($domain['name']);

            $domainsWithInfo[] = $domain;
        }

        return $domainsWithInfo;
    }

    /**
     * Get appropriate image path for a domain based on its name
     *
     * @param string $domainName
     * @return string
     */
    private static function getDomainImagePath(string $domainName): string {
        $basePath = "../../../../uploads/";

        switch(strtolower($domainName)) {
            case 'management':
                return $basePath . "cobit.webp";
            case 'computer science':
            case 'it development':
                return $basePath . "it.png";
            case 'big data':
                return $basePath . "Big-data-main-application-areas.png";
            case 'networking':
                return $basePath . "PhysicalNetworkDiagram.jpg";
            default:
                return $basePath . "default-domain.jpg";
        }
    }
}
