<?php

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

$request = json_decode(file_get_contents('php://input'));

if (isset($request->param1) && ($request->param1==='buscarArtista'))
{
  $canciones = array();
  $sql = mysqli_query($conexion,"SELECT cancion FROM partituras WHERE id=" . $request->param2);
  while ($cancion = mysqli_fetch_object($sql))
  {
    array_push($canciones,$cancion);
  }
  echo json_encode($canciones);
}

// if (isset($_GET['cancion']))
// {
// $canciones = array();
//   $sql = mysqli_query($conexion,"SELECT cancion FROM partituras WHERE id=" .$_GET['cancion']);
//   $cancion = mysqli_fetch_array($sql);
//   while ($cancion = mysqli_fetch_object($sql))
//   {
//     array_push($canciones,$cancion);
//   }
//   echo $cancion['cancion'];
// }
?>