<?php

require_once('../app/system/boiler_plate.php');

session_start();
$_SESSION = [];
header("Location: /");