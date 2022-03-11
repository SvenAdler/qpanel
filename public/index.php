<?php

require_once('../app/system/boiler_plate.php');

use app\controller\Quiz;
use app\controller\PossibleAnswersController;
use app\controller\QuestionController;
use app\controller\TopicController;
use app\controller\SetController;

$quiz = new Quiz();
$setController = new SetController();
$topicController = new TopicController();
$questionController = new QuestionController();
$possibleAnswersController = new PossibleAnswersController();

$quiz->checkSession();
$setController->addSet();
$setController->removeSet();
$topicController->addTopic();
$topicController->removeTopic();
$questionController->addQuestion();
$questionController->removeQuestion();
$possibleAnswersController->addPossibleAnswer();
$possibleAnswersController->removePossibleAnswer();
$set_id = $quiz->getSession('set_id');
$topic_id = $quiz->getSession('topic_id');
$question_id = $quiz->getSession('question_id');
$set = $setController->getCurrentSetByID($set_id);

require('app/views/header.php');
if ($set_id === null) {
    require('app/views/home.php');
} else {
    require('app/views/panel.php');
}

