<?php

include_once('../Clases/autoload.php');

$ranking = BaseMYSQL::ranking($_POST['id'],$pdo);
$json = json_encode($ranking);
echo $json;
