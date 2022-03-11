<?php

require_once('../app/system/boiler_plate.php');

use app\controller\TopicController;

$topicController = new TopicController();

$topicController->editTopic();

if (!headers_sent()) {
    header('HTTP/1.1 301 Found');
    header('Location: ' . '/');
} else {
    print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
}