<?php

require_once('../app/system/boiler_plate.php');

use app\controller\QuestionController;

$questionController = new QuestionController();

$questionController->editQuestion();

if (!headers_sent()) {
    header('HTTP/1.1 301 Found');
    header('Location: ' . '/');
} else {
    print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
}
