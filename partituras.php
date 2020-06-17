<div id="archivos">
  <input type="file" id="file-input" />
</div>
<pre id="contenido-archivo"></pre>

<?php
$texto = "RE  LA   SIm         SOL        RE        LA";
$letras = str_split($texto);
echo count($letras);
?>
<script>

  (function() {
    document.getElementById('file-input').addEventListener('change', leerArchivo, false);
  })();


function leerArchivo(e)
{
  var archivo = e.target.files[0];
  if (!archivo) {
    return;
  }

  var lector = new FileReader();

  lector.onload = function(e) {
    var contenido = e.target.result;
    var allRows = contenido.split(/\r?\n|\r/);
    console.log(allRows);
    ajax(allRows,'grabar');
   };
  lector.readAsText(archivo, 'UTF-8');
}

function ajax(value, action)
{
    var xHttp = new XMLHttpRequest();
    var parametros =
    {
      param1: 'grabar',
      param2: value
    };

    xHttp.onreadystatechange = function ()
    {
      if ((xHttp.readyState === 4) && (xHttp.status === 200))
      {
        console.log(xHttp.responseText);
      }
    }
  xHttp.open('POST', 'funciones.php', true);
  xHttp.setRequestHeader("Content-type", "application/json");
  xHttp.send(JSON.stringify(parametros));
}


</script>