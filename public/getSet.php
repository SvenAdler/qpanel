<?php

require_once('../app/system/boiler_plate.php');

use app\controller\SetController;

$setController = new SetController();
$set = $setController->getCurrentSetByID($_GET["set_id"]);
print json_encode($set, JSON_HEX_APOS);