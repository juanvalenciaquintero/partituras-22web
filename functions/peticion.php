<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Content-type : application/json");
header("Acces-Control-Max-Age: 86400");
    $method = $_SERVER['REQUEST_METHOD'];
   // if ($method == "OPTIONS") {
   //    die();
   // }

$request  = json_decode(file_get_contents('php://input'));

if ($request)
{
echo json_encode($request);
}

if ($_GET['valor'])
{
echo json_encode($_GET['valor']);
}


?>