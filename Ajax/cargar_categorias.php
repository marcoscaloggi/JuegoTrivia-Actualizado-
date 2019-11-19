<?php

include_once('../Clases/autoload.php');


$categorias_ranking = BaseMYSQL::categorias($pdo);
$json = json_encode($categorias_ranking);
echo $json;
