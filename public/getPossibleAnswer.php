<?php

require_once('../app/system/boiler_plate.php');

use app\controller\QuestionController;

// TODO
// JSON formatted data for fetching in getPossibleAnswersAddData() to add a possible answer in the add possible answers modal
$possibleAnswersController = new QuestionController();
$possibleAnswer = $possibleAnswersController->getPossibleAnswer($_GET["topic_id"]);
try {
    print json_encode($possibleAnswer, JSON_THROW_ON_ERROR | JSON_HEX_APOS);
} catch (JsonException) {
}