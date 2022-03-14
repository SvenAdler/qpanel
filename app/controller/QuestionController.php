<?php

namespace app\controller;

use app\model\QuestionModel;
use app\system\Base;

class QuestionController extends Base
{
    private QuestionModel $model;

    public function __construct()
    {
        $this->model = new QuestionModel();
    }

    public function getQuestion($id)
    {
        return ($this->model)->get($id);
    }

    public function getAllByIDs(?int $set_id = null, ?int $topic_id = null): array
    {
        return ($this->model->getAllByIDs($set_id, $topic_id));
    }

    // For Possible Answers
    public function getQuestionTitlesByTopicID($id): array
    {
        return ($this->model->getTitlesBy($id));
    }

    public function addQuestion(): void
    {
        if (((isset($_POST['question_rel_topic'], $_POST['question_ordering'], $_POST['question_type'], $_POST['question_text'],
                    $_POST['goto_default'])) || !isset($_POST['goto_default'])) &&
            (!empty($_POST['question_rel_topic']) && !empty($_POST['question_ordering']) && !empty($_POST['question_type']) &&
                !empty($_POST['question_text']))) {
            $relatedTopic = (int)$_POST['question_rel_topic'];
            $ordering = (int)$_POST['question_ordering'];
            $questionType = $_POST['question_type'];
            $questionText = $_POST['question_text'];
            if (empty($_POST['goto_default'])) {
                $gotoDefault = null;
            } else {
                $gotoDefault = $_POST['goto_default'];
            }
            $this->model->add($relatedTopic, $ordering, $questionType, $questionText, $gotoDefault);
            if (!headers_sent()) {
                header('HTTP/1.1 301 Found');
                header('Location: ' . '/');
            } else {
                print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
            }
        }
    }

    public function removeQuestion()
    {
        $rm_id = isset($_GET['removeQuestion']) ? (int)$_GET['removeQuestion'] : null;
        if (is_null($rm_id)) {
            return null;
        }
        $this->model->remove($rm_id);
    }

    public function editQuestion(): void
    {
        if (isset($_POST['ed_question_id'], $_POST['ed_question_reltopic'], $_POST['ed_question_ordering'], $_POST['ed_question_type'], $_POST['ed_question_text'], $_POST['ed_goto_default'])
            && !empty($_POST['ed_question_id']) && !empty($_POST['ed_question_reltopic']) && !empty($_POST['ed_question_ordering']) && !empty($_POST['ed_question_type']) && !empty($_POST['ed_question_text'])) {
            if (empty($_POST['goto_default'])) {
                $gotoDefault = null;
            } else {
                $gotoDefault = $_POST['goto_default'];
            }
            $this->model->edit((int)$_POST['ed_question_id'], (int)$_POST['ed_question_reltopic'], (int)$_POST['ed_question_ordering'], $_POST['ed_question_type'],
                $_POST['ed_question_text'], $gotoDefault);
        }
    }
}