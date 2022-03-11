<?php

namespace app\model;

use PDO;

class PossibleAnswersModel extends BaseModel
{
    public function getBy($question_id): array
    {
        if ($question_id === null) {
            return [];
        }
        $sql = 'SELECT possible_answer.* FROM possible_answer
                LEFT JOIN question
                ON possible_answer.question_id = question.id
                WHERE question.id = ?';
        $stm = $this->bind($sql, $question_id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        $possible_answer = $stm->fetchAll(PDO::FETCH_OBJ);

        return $possible_answer ?? [];
    }

    public function add(int $rel_question_id, $answerText, $minPoints, $maxPoints, $goto, int $ordering): void
    {
        $sql = 'INSERT INTO possible_answer(question_id, ordering, answer_text, min_points, max_points, goto) 
                VALUES(?, ?, ?, ?, ?, ?)';
        $stm = $this->bind($sql, $rel_question_id, $ordering, $answerText, $minPoints, $maxPoints, $goto);
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
        $sql = 'DELETE FROM possible_answer 
                WHERE id = ?';
        $stm = $this->bind($sql, $id);
        try {
            $stm->execute();
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

//TODO edit for possible answers
    public function edit(int $id, int $topic_id, int $ordering, $questionType, $questionText, $gotoDefault): void
    {
//        $sql = 'UPDATE question SET topic_id = ?, ordering = ?, question_type = ?,
//                    question_text = ?, goto_default = ?
//                WHERE id = ?';
//        $stm = $this->bind($sql, $topic_id, $ordering, $questionType, $questionText, $gotoDefault, $id);
//        try {
//            $stm->execute();
//        } catch (\Exception $e) {
//            print $e->getMessage();
//        }
    }
}