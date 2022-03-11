<?php

namespace app\model;

use PDO;

class QuestionModel extends BaseModel
{
    public function get($id)
    {
        if ($id === null) {
            $question = false;
        } else {
            $sql = 'SELECT * FROM question 
                    WHERE id = ? LIMIT 1';

            $stm = $this->bind($sql, $id);
            try {
                $stm->execute();
            } catch (\Exception $e) {
                print $e->getMessage();
            }
            $question = $stm->fetchObject();
        }
        return $question;
    }

    public function getTitlesBy($id): array
    {
        if ($id === null) {
            return [];
        }
        $sql = 'SELECT id, ordering, question_text 
                FROM question 
                WHERE topic_id = ? 
                ORDER BY ordering';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $questions = $stm->fetchAll(PDO::FETCH_OBJ);

        return $questions ?? [];
    }

    public function getAllByIDs(?int $set_id = null, ?int $topic_id = null): array
    {
        if ($set_id !== null) { // Prüfung auf null
            $sql = 'SELECT question.*, topic.title AS topic_title FROM question 
                    LEFT JOIN topic 
                    ON question.topic_id = topic.id 
                    WHERE topic.q_set_id = ?'; // topic.title etwas verschwenderisch
            if ($topic_id !== null) {
                $sql .= ' AND question.topic_id = ?';
                $stm = $this->bind($sql, $set_id, $topic_id);
            } else {
                $stm = $this->bind($sql, $set_id);
            }
            try {
                $stm->execute();
            } catch (\Exception $e) {
                print $e->getMessage();
            }
            $questions = $stm->fetchAll(PDO::FETCH_OBJ);
        }
        return $questions ?? [];
    }

    public function add(int $rel_topic_id, int $ordering, $questionType, $questionText, $gotoDefault): void
    {
        $sql = 'INSERT INTO question(topic_id, ordering, question_type, question_text, goto_default) 
                VALUES(?, ?, ?, ?, ?)';
        $stm = $this->bind($sql, $rel_topic_id, $ordering, $questionType, $questionText, $gotoDefault);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function remove(int $id): void
    {
//        $sql = 'UPDATE question
//                SET is_deleted = 1
//                WHERE id = ?';
        $sql = 'DELETE FROM question 
                WHERE id = ?';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function edit(int $id, int $topic_id, int $ordering, $questionType, $questionText, $gotoDefault): void
    {
        $sql = 'UPDATE question SET topic_id = ?, ordering = ?, question_type = ?,
                    question_text = ?, goto_default = ? 
                WHERE id = ?';
        $stm = $this->bind($sql, $topic_id, $ordering, $questionType, $questionText, $gotoDefault, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }
}