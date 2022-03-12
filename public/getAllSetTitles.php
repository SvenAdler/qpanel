<?php

require_once('../app/system/boiler_plate.php');

use app\controller\SetController;
//Get all Set Titles for the selected element in the edit topic modal
$setController = new SetController();
$sets = $setController->getAllTitles();
try {
    print json_encode($sets, JSON_THROW_ON_ERROR | JSON_HEX_APOS);
} catch (JsonException) {
}