<?php

namespace App\Repository;

use App\Entity\Directory;

class DirectoryRepository extends BaseRepository
{
    public function findAll(): array
    {
        return $this->db->select("SELECT * FROM directory;");
    }

    /**
     * @param string $type
     *
     * @return Directory[]
     */
    public function findByType(string $type): array
    {
        return $this->db->select("SELECT * FROM directory WHERE type = '{$type}';", Directory::class);
    }

    public function deleteByIds(array $ids)
    {
        if (!$ids) { return null; }

        $stmt = $this->db->conn->prepare("DELETE FROM directory WHERE id IN (:id)");

        $ids = implode(", ", $ids);
        $stmt->bindParam(":id", $ids);

        $this->db->conn->query(str_replace("'", "", $stmt->getSQL(true)));
        $stmt->clear();
    }
}
