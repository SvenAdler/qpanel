<?php

require_once('../app/system/boiler_plate.php');

use app\controller\SetController;

$setController = new SetController();

try {
    print $setController->outputJSON();
} catch (JsonException) {
}