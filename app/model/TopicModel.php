<?php

namespace app\model;

use PDO;

class TopicModel extends BaseModel
{
    public function get($id)
    {
        if ($id === null) {
            $topic = false;
        } else {
            $sql = 'SELECT * FROM topic 
                    WHERE id = ? LIMIT 1';

            $stm = $this->bind($sql, $id);
            try {
                $stm->execute();
            } catch (\Exception $e) {
                print $e->getMessage();
            }
            $topic = $stm->fetchObject();
        }
        return $topic;
    }

    public function getBy($id): array
    {
        if ($id === null) {
            return [];
        }
        $sql = 'SELECT * FROM topic 
                WHERE q_set_id = ? 
                ORDER BY ordering';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $topics = $stm->fetchAll(PDO::FETCH_OBJ);

        return $topics ?? [];
    }

    public function getTitlesBy($id): array
    {
        if ($id === null) {
            return [];
        }
        $sql = 'SELECT id, ordering, title 
                FROM topic 
                WHERE q_set_id = ? 
                ORDER BY ordering';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $topics = $stm->fetchAll(PDO::FETCH_OBJ);

        return $topics ?? [];
    }

    public function add(int $q_set_id, int $ordering, string $title): void
    {
        $sql = 'INSERT INTO topic(q_set_id, ordering, title) 
                VALUES(?, ?, ?)';
        $stm = $this->bind($sql, $q_set_id, $ordering, $title);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function remove(int $id): void
    {
//        $sql = 'UPDATE topic
//                SET is_deleted = 1
//                WHERE id = ?';
        $sql = 'DELETE FROM q_set 
                WHERE id = ?';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function edit(int $id, int $q_set_id, int $ordering, string $title): void
    {
        $sql = 'UPDATE topic 
                SET q_set_id = ?, ordering = ?, title = ? 
                WHERE id = ?';
        $stm = $this->bind($sql, $q_set_id, $ordering, $title, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }
}