<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Partituras</title>
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
      <div id="selectArt">
        <label for="filtroArtista">Artista o grupo</label>
        <select name="filtroArtista" id="filtroArtista" onchange="buscarCancion();">
          <option value="0">Todos</option>
  <?php
          $sqlArtist = mysqli_query($conexion,"SELECT id,artista FROM partituras" . $andArtista . $andCancion . " GROUP BY artista");
          while ($option = mysqli_fetch_object($sqlArtist))
          {
            echo '<option value="' . $option->artista . '" ' . (($option->artista===$filtroArtista) ? 'selected' : '') .  '>' . $option->artista . '</option>';
          }
  ?>
        </select>
      </div>
      <div id="selectCan">
        <label for="filtroCancion">Canción</label>
        <select name="filtroCancion" id="filtroCancion">
  <?php
      $sqlCancion = mysqli_query($conexion,"SELECT id,cancion,artista FROM partituras" . $andArtista . $andCancion);
      while ($option = mysqli_fetch_object($sqlCancion))
      {
        echo '<option value="' . $option->cancion . '" ' . (($option->cancion===$filtroCancion) ? 'selected' : '') .  '>' . $option->cancion . '</option>';
      }
  ?>
        </select>
      </div>
      <div>
        <input type="button" id="btnBuscar"  class="start" onclick="elegirCancion()" value="Buscar">
      </div>
    </form>
  </div>


    <div id="partitura">
    <!-- <iframe  src="WISH YOU WHERE HERE.pdf#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1500px"></iframe> -->
    </div>

  <div id="botonera">
    <div id="divBtnScroll">
      <input type="button" id="btnMenos"  class="start" onclick="menosScroll()" value="-">
      <input type="button" id="btnScroll" class="start" onclick="toggleScroll()" value="Start/Stop">
      <input type="button" id="btnMas"    class="start" onclick="masScroll()" value="+">
    </div>
    <div id="divBtnReset">
     <input type="button" id="btnReset"  class="start" onclick="resetScroll()" value="Reset">
    </div>

  </div>
  </body>
</html>
<script>
(function(){
  var velocidad_inicial = '100';
  var position = '0';
  localStorage.setItem('position', position);
  localStorage.setItem('velocidad', velocidad_inicial);
  console.log('position: ' + position);
  console.log('velocidad: ' + velocidad_inicial);
})();
</script>