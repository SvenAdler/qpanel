<?php

require_once('../app/system/boiler_plate.php');

use app\controller\TopicController;
// JSON formatted data for fetching in getTopicData() to edit a topic in the edit topic modal
$topicController = new TopicController();
$topic = $topicController->getTopic($_GET["topic_id"]);
try {
    print json_encode($topic, JSON_THROW_ON_ERROR | JSON_HEX_APOS);
} catch (JsonException) {
}