<?php

require_once('../app/system/boiler_plate.php');

use app\controller\TopicController;

$topicController = new TopicController();
$topic = $topicController->getTopicTitlesBySetID($_GET["set_id"]);
print json_encode($topic, JSON_HEX_APOS);