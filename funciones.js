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

function elegirCancion()
{
    var el = document.querySelector('#filtroCancion').value;
    var xHttp = new XMLHttpRequest();
    var parametros = {
      param1: 'buscarCancion',
      param2: el
    };

      xHttp.onreadystatechange = function()
      {
        if ((xHttp.readyState === 4) && (xHttp.status === 200))
        {
          var datos = JSON.parse(xHttp.responseText);
          console.log(datos[0]);
          var elemento = document.querySelector('#partitura');
          elemento.innerHTML = datos[0].partitura;
        }
      }

      xHttp.open('POST', 'funciones.php', true);
      xHttp.setRequestHeader("Content-type", "application/json");
      xHttp.send(JSON.stringify(parametros));

}

function buscarCancion()
{
  var el = document.querySelector('#filtroArtista').value;

  var xHttp = new XMLHttpRequest();
  var parametros = {
    param1: 'buscarArtista',
    param2: el
  };


  xHttp.onreadystatechange = function ()
  {
    if ((xHttp.readyState === 4) && (xHttp.status === 200))
    {
      var elemento = document.querySelector('#filtroCancion');
      console.log(xHttp.responseText);
      var datos = JSON.parse(xHttp.responseText);
      console.log(datos[0]['cancion']);
      var textoSelect = '';
      for (let i = 0; i < datos.length; i++) {
        textoSelect  += '<option value="' +  datos[i]['cancion'] + '">' + datos[i]['cancion'] + '</option>';
      }
      elemento.innerHTML = textoSelect;
    }
  };

  xHttp.open('POST', 'funciones.php', true);
  xHttp.setRequestHeader("Content-type", "application/json");
  xHttp.send(JSON.stringify(parametros));
}