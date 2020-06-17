<!-- <div id="archivos">
  <input type="file" id="file-input" />
</div>
<pre id="contenido-archivo"></pre> -->
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
<style>

#wrapper
{
  width:100%;
  display:flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding:5px;
}

#wrapper>div
{
  width:100%;
margin-top:20px;
}
#wrapper div label
{
  width:10%;
}
#wrapper div input
{
  width:90%;
  height:30px;
}

#wrapper div textarea
{
  width:90%;
  height:60vh;
  margin:0;
}
#partitura
{
  width:80%;
  height:300px;
}
</style>
<form name="formulario" id="formulario" method="post" action="funciones.php">
<div id="wrapper">
  <div>
    <div>
      <label for="artista">Artista o grupo</label>
    </div>
    <div>
      <input type="text" id="artista" name="artista">
    </div>
  </div>
  <div>
    <div>
      <label for="cancion">Canción</label>
    </div>
    <div>
      <input type="text" id="cancion" name="cancion">
    </div>
  </div>
  <div>
    <div>
      <label for="partitura">Partitura</label>
    </div>
    <div>
      <textarea id="partitura" name="partitura"></textarea>
    </div>
  </div>
  <div>
    <input type="button" value="Grabar" onclick="grabarPartitura()">
  </div>
</div>
</form>
 </body>
</html>
<?php

?>
<script>


// function leerArchivo(e)
// {
//   var archivo = e.target.files[0];
//   if (!archivo) {
//     return;
//   }

//   var lector = new FileReader();

//   lector.onload = function(e) {
//     var contenido = e.target.result;
//     var allRows = contenido.split(/\r?\n|\r/);
//     console.log(allRows);
//     ajax(allRows,'grabar');
//    };
//   lector.readAsText(archivo, 'UTF-8');
// }

// function ajax(value, action)
// {
//     var xHttp = new XMLHttpRequest();
//     var parametros =
//     {
//       param1: 'grabar',
//       param2: value
//     };

//     xHttp.onreadystatechange = function ()
//     {
//       if ((xHttp.readyState === 4) && (xHttp.status === 200))
//       {
//         console.log(xHttp.responseText);
//       }
//     }
//   xHttp.open('POST', 'funciones.php', true);
//   xHttp.setRequestHeader("Content-type", "application/json");
//   xHttp.send(JSON.stringify(parametros));
// }


</script>