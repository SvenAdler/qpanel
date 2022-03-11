<?php

namespace app\model;

use PDO;

class SetModel extends BaseModel
{
    public function getAll(): array
    {
        $sql = 'SELECT * FROM q_set 
                WHERE is_deleted = 0 
                ORDER BY ordering, title';
        $stm = $this->db->prepare($sql);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $sets = $stm->fetchAll(PDO::FETCH_OBJ);

        return $sets ?? [];
    }

    public function getAllTitles(): array
    {
        $sql = 'SELECT id, ordering, title 
                FROM q_set 
                WHERE is_deleted = 0
                ORDER BY ordering, title';
        $stm = $this->db->prepare($sql);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $sets = $stm->fetchAll(PDO::FETCH_OBJ);

        return $sets ?? [];
    }

    public function get($id): bool|\stdClass
    {
        if ($id === null) {
            $set = false;
        } else {
            $sql = 'SELECT * FROM q_set 
                    WHERE id = ? LIMIT 1';

            $stm = $this->bind($sql, $id);
            try {
                $stm->execute();
            } catch (\Exception $e) {
                print $e->getMessage();
            }
            $set = $stm->fetchObject();
        }
        return $set;
    }

    public function add(int $ordering, string $title)
    {
        $sql = 'INSERT INTO q_set(ordering, title) 
                VALUES(?, ?)';
        $stm = $this->bind($sql, $ordering, $title);
        try {
            $stm->execute();
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        return false; // default return, wenn es nicht funktioniert
    }

    public function remove(int $id): void
    {
        $sql = 'UPDATE q_set 
                SET is_deleted = 1 
                WHERE id = ?';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function edit(int $id, int $ordering, string $title): void
    {
        $sql = 'UPDATE q_set 
                SET ordering = ?, title = ? 
                WHERE id = ?';
        $stm = $this->bind($sql, $ordering, $title, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function getOutputData($id): bool|array
    {
//        $set = [];

        $sql = 'SELECT
                q_set.ordering AS setOrdering, q_set.title AS setTitle,
                topic.q_set_id, topic.ordering AS topicOrdering, topic.title AS topicTitle,
                question.id AS questionID, question_type, question.question_text, question.goto_default,
                question.topic_id, question.ordering AS questionOrdering, 
                possible_answer.id AS paID, possible_answer.question_id, possible_answer.ordering AS possAnswOrdering, possible_answer.answer_text,
                possible_answer.min_points, possible_answer.max_points, possible_answer.`goto`
                FROM q_set
                    LEFT JOIN topic
                    ON q_set.id = topic.q_set_id
                        LEFT JOIN question
                        ON topic.id = question.topic_id
                            LEFT JOIN possible_answer
                            ON question.id = possible_answer.question_id
                WHERE q_set.id = ?';

        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $set_data = $stm->fetchAll();

        /**
         * TODO Set name in Datenstruktur aufnhemen
         * TODO Fragen Content für den Willkommenstext
         * TODO Nur singlechoice Fragen in der Struktur?
         */
        $question = [];
        foreach ($set_data ?? [] as $data) {
            if (array_key_exists($data['questionID'], $question)) {
                $question[$data['questionID']]['possible_answers'][$data['paID']] = [
                    'answertext' => $data['answer_text'],
                    'goto' => $data['goto'],
                    'points' => $data['min_points']
                ];
            } else {
                $question[$data['questionID']] =
                    [
                        'topic_nr' => $data['topic_id'],
                        'topic_title' => $data['topicTitle'],
                        'question_nr' => $data['questionOrdering'],
                        'question_text' => $data['question_text'],
                        'possible_answers' => [
                            $data['paID'] => [
                                'answertext' => $data['answer_text'],
                                'goto' => $data['goto'],
                                'points' => $data['min_points']
                            ],
                            'answer' => null
                        ]
                    ];
            }
        }
        return $question ?? [];
    }
}