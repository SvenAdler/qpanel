<?php

namespace app\controller;

use app\model\PossibleAnswersModel;
use app\system\Base;

class PossibleAnswersController extends Base
{
    private PossibleAnswersModel $model;

    public function __construct()
    {
        $this->model = new PossibleAnswersModel();
    }

    public function getPossibleAnswersByQuestionID($question_id): array
    {
        return ($this->model->getBy($question_id));
    }

    public function addPossibleAnswer()
    {
        if ((isset($_POST['rel_pa']) && isset($_POST['pa_text']) && isset($_POST['min_points']) &&
                isset($_POST['max_points']) && (isset($_POST['pa_goto']) || !isset($_POST['pa_goto'])) && isset($_POST['pa_ordering'])) &&
            (!empty($_POST['rel_pa']) && !empty($_POST['pa_text']) && !empty($_POST['min_points']) &&
                !empty($_POST['pa_ordering']))) {
            $relatedQuestion = $_POST['rel_pa'];
            $text = $_POST['pa_text'];
            $minPoints = (int)$_POST['min_points'];
            if (empty($_POST['max_points'])) {
                $maxPoints = null;
            } else {
                $maxPoints = (int)$_POST['max_points'];
            }
            if (empty($_POST['pa_goto'])) {
                $goto = null;
            } else {
                $goto = $_POST['pa_goto'];
            }
            $ordering = (int)$_POST['pa_ordering'];
            $this->model->add($relatedQuestion, $text, $minPoints, $maxPoints, $goto, $ordering);
            if (!headers_sent()) {
                header('HTTP/1.1 301 Found');
                header('Location: ' . '/');
            } else {
                print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
            }
        }
    }

    public function removePossibleAnswer()
    {
        $rm_id = isset($_GET['remove_pa']) ? (int)$_GET['remove_pa'] : null;
        if (is_null($rm_id)) {
            return null;
        }
        $this->model->remove($rm_id);
    }

    public function editPossibleAnswer()
    {
//        if ((isset($_POST['ed_question_id']) && isset($_POST['ed_question_reltopic']) && isset($_POST['ed_question_ordering']) && isset($_POST['ed_question_type']) &&
//                isset($_POST['ed_question_text']) && isset($_POST['ed_goto_default'])) &&
//            (!empty($_POST['ed_question_id']) && !empty($_POST['ed_question_reltopic']) && !empty($_POST['ed_question_ordering']) && !empty($_POST['ed_question_type']) &&
//                !empty($_POST['ed_question_text']))) {
//            if (empty($_POST['goto_default'])) {
//                $gotoDefault = null;
//            } else {
//                $gotoDefault = $_POST['goto_default'];
//            }
//            $this->model->edit((int)$_POST['ed_question_id'], (int)$_POST['ed_question_reltopic'], (int)$_POST['ed_question_ordering'], $_POST['ed_question_type'],
//                $_POST['ed_question_text'], $gotoDefault);
//        }
    }
}