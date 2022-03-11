<?php

require_once('../app/system/boiler_plate.php');

use app\controller\SetController;

$setController = new SetController();

header('Content-Type: text/json; charset=utf-8');
header('Content-Disposition: attachment; filename=output.json');
print_r($setController->outputJSON());