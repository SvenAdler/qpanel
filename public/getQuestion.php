<?php

require_once('../app/system/boiler_plate.php');

use app\controller\QuestionController;

// JSON formatted data for fetching in getQuestionData() to edit a question in the edit question modal
$questionController = new QuestionController();
$question = $questionController->getQuestion($_GET["question_id"]);
try {
    print json_encode($question, JSON_THROW_ON_ERROR | JSON_HEX_APOS);
} catch (JsonException) {
}