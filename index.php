<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <script src="funciones.js"></script>
</head>
  <body>
<?php

  $conexion = mysqli_connect('sql108.byethost.com','b22_21042562','42180200','b22_21042562_partituras');

  $filtroArtista = (isset($_GET['filtroArtista']) ? $_GET['filtroArtista'] : '');
  $filtroCancion = (isset($_GET['filtroCancion']) ? $_GET['filtroCancion'] : '');

  $andArtista =   ($filtroArtista!=='') ? ' WHERE artista="' . $filtroArtista . '"' : '';
  $andCancion =   ($filtroCancion!=='') ? (( $andArtista!=='') ? ' AND cancion="' . $filtroCancion . '"' : ' WHERE cancion="' . $filtroCancion . '"') : '' ;

?>
  <div id="filtros">
    <form name="filtro">
      <label for="filtroArtista">Artista o grupo</label>
      <select name="filtroArtista" id="filtroArtista" onchange="buscarCancion();">
<?php
        $sqlArtist = mysqli_query($conexion,"SELECT id,artista FROM partituras" . $andArtista . $andCancion);
        while ($option = mysqli_fetch_object($sqlArtist))
        {
          echo '<option value="' . $option->id . '" ' . (($option->artista===$filtroArtista) ? 'selected' : '') .  '>' . $option->artista . '</option>';
        }
?>
      </select>
      <label for="filtroCancion">Canción</label>
      <select name="filtroCancion" id="filtroCancion">
<?php
    $sqlCancion = mysqli_query($conexion,"SELECT id,cancion FROM partituras" . $andArtista . $andCancion);
    while ($option = mysqli_fetch_object($sqlCancion))
    {
      echo '<option value="' . $option->id . '" ' . (($option->cancion===$filtroCancion) ? 'selected' : '') .  '>' . $option->cancion . '</option>';
    }
?>
      </select>
      <input type="button" id="btnBuscar"  class="start" onclick="" value="Buscar">
    </form>
  </div>
  <div id="botonera">
    <input type="button" id="btnMenos"  class="start" onclick="" value="-">
    <input type="button" id="btnScroll" class="start" onclick="toggleScroll()" value="Start/Stop">
    <input type="button" id="btnMas"    class="start" onclick="" value="+">
    <input type="button" id="btnReset"  class="start" onclick="" value="Reset">
  </div>

    <div id="partitura">
    <!-- <iframe  src="WISH YOU WHERE HERE.pdf#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1500px"></iframe> -->
    </div>
  </body>
</html>

<script>
  getTablatura();
</script>