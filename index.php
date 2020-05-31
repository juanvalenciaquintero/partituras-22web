<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<style>
  div
{
  width:70%;
  height:1500px;
  margin:0 auto;
}

#btnScroll
{
position:fixed;
top:0;
left:0;
}
.start
{
background-color: greenyellow;
}

.stop
{
background-color: red;
}


</style>
<script>
function toggleScroll()
{
  var elemento = document.querySelector('#btnScroll');
  var clase = elemento.className;
  console.log(clase);
  if (clase==='start')
  {
    elemento.classList.remove("start");
    elemento.classList.add("stop");
    localStorage.setItem('scroll', '1');
    pageScroll();
  } else
  {
    elemento.classList.remove("stop");
    elemento.classList.add("start");
    localStorage.setItem('scroll', '0');
  }
  console.log(localStorage.getItem('scroll'));
}

function pageScroll() {
    var scrollBln = localStorage.getItem('scroll');
    console.log(scrollBln);
    if (scrollBln==='1')
    {
        window.scrollBy(0,1);
        scrolldelay = setTimeout(pageScroll,150);
    }
}

function getTablatura()
{
    var xHttp = new XMLHttpRequest();
    var parametros = {
      param1: 'grabar'
    };


      xHttp.onreadystatechange = function()
      {
        if ((xHttp.readyState === 4) && (xHttp.status === 200))
        {


          var datos = JSON.parse(xHttp.responseText);
          console.log(datos[0]);
          var tablatura = document.getElementById('tablatura');
          tablatura.innerHTML = datos[0].partitura;
        }
      }

      xHttp.open('POST', 'http://estadisticas.dx.am/functionsPart.php?partitura=Cadillac solitario', true);
      xHttp.setRequestHeader("Content-type", "application/json");
      xHttp.send(JSON.stringify(parametros));

}


</script>
</head>
<body>
<input type="button" id="btnScroll" class="start" onclick="toggleScroll()" value="Start/Stop">
<div id="tablatura">
  <!-- <iframe  src="WISH YOU WHERE HERE.pdf#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1500px"></iframe> -->
</div>
</body>
</html>

<script>
getTablatura();

</script>