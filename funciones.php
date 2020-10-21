<?php

$conexion = mysqli_connect('localhost','valquint_juan','42180200Az','valquint_partituras');

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

  $id = isset($request->param2) ? $request->param2 : '0';

  $where = ($id === '0') ? ' ' : ' WHERE artista="' . $id . '"';

  $canciones = array();

  $sql = mysqli_query($conexion,"SELECT cancion FROM partituras " . $where );

  while ($cancion = mysqli_fetch_object($sql))

  {

    array_push($canciones,$cancion);

  }

  echo json_encode($canciones);

}


if (isset($request->param1) && ($request->param1==='buscarCancion'))

{

  $id = isset($request->param2) ? $request->param2 : '0';

  $sqlCancion = ($id === '0') ? 'Error' : "SELECT * FROM partituras WHERE cancion='"  . $id . "'";

  $canciones = array();

  if ($sqlCancion !== 'Error')

  {

    $sql = mysqli_query($conexion,$sqlCancion);

    while ($cancion = mysqli_fetch_object($sql))

    {

      array_push($canciones,$cancion);

    }

    } else

    {

      array_push($canciones,$sqlCancion);

  }

  echo json_encode($canciones);

}


if (isset($request->param1) && ($request->param1==='grabar'))

{

  $artista = $request->param2;

  $cancion = $request->param3;

  $partitura = $request->param4;


  $datos = preg_split('/\r?\n|\r/', $partitura);

  //Primero vemos cuantas filas tiene el fichero

  $filas = count($datos);

  $texto = '';

  for ($i = 1; $i < count($datos); $i++)

  {

    $texto .= '<p>';

    $letras = str_split($datos[$i]);

    for ($j=0; $j <count($letras) ; $j++) {


      if ($letras[$j]===' ')

      {

        $texto .= '&nbsp;';

      } else

      {

       $texto .=$letras[$j];

      }

    }

    $texto .='</p>';

  }

 $sql = 'INSERT INTO partituras (artista,cancion,partitura) VALUES ("' . $artista . '","' . $cancion . '","'. $texto . '")';

mysqli_query($conexion,$sql);

echo json_encode($sql);

}


?>