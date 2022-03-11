<?php

require_once('../app/system/boiler_plate.php');

use app\controller\QuestionController;

// JSON formatted data for fetching in getPossibleAnswersAddData() to add a possible answer in the add possible answers modal
$questionController = new QuestionController();
$question = $questionController->getQuestionTitlesByTopicID($_GET["topic_id"]);
print json_encode($question, JSON_HEX_APOS);