<?php 

function toStatic($buffer){
  $a = array( 
    'á','é','í','ó','ú','ñ',
    'Á','É','Í','Ó','Ú','Ñ'
  );
  $b = array( 
    '&aacute;','&eacute;','&iacute;','&oacute;','&uacute;','&ntilde;',
    '&Aacute;','&Eacute;','&Iacute;','&Oacute;','&Uacute;','&Ntilde;'
  );
  $buffer = str_replace($a, $b, $buffer);
  file_put_contents('index.html', $buffer);
  return $buffer;  
}

ob_start("toStatic"); 

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Programando.la - Aprender a programar gratis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aprender programacion gratis por que aqui SI estamos mejorandola.">
    <meta name="author" content="Ivan castellanos">
    <meta name="twitter" content="ivanca">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body class="nojs">
    <script>document.body && (document.body.className = "");</script>

    <?php 
    function printMenu($wiki, $pagOficial=''){
    ?>
              <p>
                <a class="btn btn_video_es" href="#">Vídeos en Español</a>
                <!-- <a class="btn btn_video_en" href="#">Videos en Ingles</a> -->
              </p>
              <p class="text_links">
                <a class="btn" href="http://es.wikipedia.org/wiki/<?php echo $wiki ?>" target="_blank">Wikipedia</a>
                <a class="btn btn_doc" href="#">Documentos</a>                
                <?php if(!empty($pagOficial)){
                  echo '<a class="btn btn_docs" target="_blank" href="'.$pagOficial.'">Pagina oficial</a>';
                }?>
              </p>
    <?php } 
    function printList($file){
      $source = readfile('source/'.$file.".html");
    }
    ?>
    <div class="container">
      <div class="hero-unit">
        <h1 class="hero-title">Programando.la!</h1>
        <img src="img/logo.png" alt="@Freddier y su fiel amigo">
        <p>Directorio para aprender todo lo que ellos enseñan pero 100% gratis.</p>
        <div class="lol"></div>
      </div>
      <div class="row">
        <div class="span4">
          <h2 title="Dificultad: Muy facil">Paginas web HTML5</h2>
          <p>Aprende a crear paginas web de la forma moderna con todos los beneficios que esta trae.</p>
          <?php printMenu("HTML5") ?>
          <ul>
            <?php printList('html5') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2  title="Dificultad: Moderada">Javascript y jQuery</h2>
          <p>Es un lenguaje <a title="Programación basada en prototipos es un estilo de programación orientada a objetos en el cual, las 'clases' no están presentes, pero la reutilizacion de codigo se hace a travez de clonacion de objetos persistentes. Los cuales sirven de base para el nuevo objeto.">basado en prototipos</a> y es el <a title="Javascript se utiliza principalmente en su forma del lado del cliente (client-side), implementado como parte de un navegador web permitiendo mejoras en la interfaz de usuario y páginas web dinámicas, en bases de datos locales al navegador. También existe una forma de JavaScript del lado del servidor, la mas popular es Node.JS">unico</a> usado para proveer interactividad en la web. También se enseña un poco sobre <a title="jQuery es una biblioteca de JavaScript, creada inicialmente por John Resig, que permite simplificar la manera de interactuar con los documentos HTML">jQuery</a>.</p>
          <?php printMenu("JavaScript") ?>
          <ul>
            <?php printList('javascript') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2 title="Dificultad: Facil">CSS3</h2>
          <p>CSS significa Cascade Style Sheeting, que traduce estilos de hoja en cascada. CSS es lo que hace que las paginas web (HTML) tengan una apariencia y organizacion.</p>
          <?php printMenu("CSS3") ?>
          <ul>
            <?php printList('css3') ?>
          </ul>
          <ul>
          </ul>
        </div><!--/span-->
      </div><!--/row-->

      <div class="row">
        <div class="span4">
          <h2 title="Dificultad: Moderada">Python</h2>
          <p>Python es un lenguaje de <a title="Un lenguaje interpretado es un lenguaje de programación que está diseñado para ser ejecutado por medio de un intérprete, en contraste con los lenguajes compilados. Los lenguages compilados hay que procesarlos para guardarlos como un archivo ejecutable; en los lenguages interpretados no es necesario.">programación interpretado</a> y multiparadigma con un enfoque en una sintaxis muy simple y que favorezca un código legible. Es lenguaje que usa YouTube.</p>
          <?php printMenu("Python", "http://python.org/") ?>
          <ul>
            <?php printList('python') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2 title="Dificultad: Facil">PHP</h2>
          <p>Es un lenguaje multiparadigma enfocado en el desarrollo de sitios web. Es muy facil de aprender y es soportada por muchos <a title="El alojamiento web (en inglés web hosting) es el servicio que provee a los usuarios de Internet un sistema para poder almacenar información, imágenes, vídeo, o cualquier contenido accesible vía web, por ej. paginas PHP.">web hosting</a> pero sufre de algunas inconcistencias. Es el lenguaje que usa Facebook.</p>
          <?php printMenu("PHP","http://php.net/") ?>
          <ul>
            <?php printList('php') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2 title="Dificultad: Sobresaliente">Java</h2>
          <p>Es un lenguaje <a title="La programación orientada a objetos o POO es un paradigma de programación que usa 'objetos' y 'clases' en sus interacciones para diseñar aplicaciones. Como analogia se puede decir que las 'clases' son los planos dibujados para la construccion de una casa y los 'objetos' son todas las casas que se hacen a partir de ese plano.">orientado objetos</a> que se caracteriza por ser usado en grandes empresas y por su velocidad de ejecución. Es un lenguaje que Google usa extensamente.</p>
          <?php printMenu("Java_(lenguaje_de_programación)", 'http://www.java.com/en/') ?>
          <ul>
            <?php printList('java') ?>
          </ul>
        </div><!--/span-->
      </div><!--/row-->


      <div class="row">
        <div class="span4">
          <h2 title="Dificultad: Moderada">Ruby</h2>
          <p>Es un lenguaje orientado objetos que se caracteriza por ser usado en aplicaciones de escritorio y <a title="Como peliculas pero usted tiene algo de control sobre lo que sucede! :)">videojuegos</a>. Es un lenguaje que EA, Valve y otras importantes empresas de videojuegos usan.</p>
          <?php printMenu("Ruby", "http://www.ruby-lang.org/en/") ?>
          <ul>
            <?php printList('ruby') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2 title="Dificultad: Facil/Moderada">Ruby On Rails</h2>
          <p>El framework mas completo para crear sitios web en Ruby. Asegurate de entender algunos tutoriales de Ruby primero.</p>
          <?php printMenu("Ruby_on_Rails", 'http://rubyonrails.org/') ?>
          <ul>
            <?php printList('rails') ?>
          </ul>
        </div><!--/span-->
        <div class="span4">
          <h2 title="Dificultad: Dificil/Moderada">C++</h2>
          <p>Es un lenguaje de bajo nivel orientado objetos que se caracteriza por ser usado en aplicaciones de escritorio y videojuegos. Es un lenguaje que EA, Valve y otras importantes empresas de videojuegos usan. Es el lenguaje con el que se desarrollo Google Chrome.</p>
          <?php printMenu("C%2B%2B", "http://isocpp.org/") ?>
          <ul>
            <?php printList('c++') ?>
          </ul>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Creado por <a class="author" href="http://twitter.com/ivanca">Ivan Castellanos</a><br>El logo animado en este sitio web es una paradia de mejorando.la<br><span title="Copyright (c) 2012 Ivan Castellanos.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.">MIT License<a><!--  - <a href="#">Fork it on github</a> --></p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>    
	<script src="js/jquery.qtip-1.0.0-rc3.min.js"></script>  
  <script src="js/app.js"></script>  
  <!-- 

  // :: Regalando.la

  // ::::Con este javascript (jQuery) saco listas de YouTube:
  
    var n = "\r\n";
  "<!-"+"- Extraido desde " + String(document.location) + " -"+"->" + n +
  $(".playlist-landing .yt-uix-tile-link").filter(function(){ return this.innerText.indexOf("Python") !== -1 }).map(function(i, e){
  return '<li>' + n + '\t<a class="video_es" href="'+e.href.replace(/&.*/,"")+'" target="_blank">' + e.innerText + "</a>" + n + "</li>"
  }).get().join(n);


  // ::::Otro ejemplo para lista PHP de Youtube:

  var n = "\r\n";
  "<!-"+"- Extraido desde " + String(document.location) + " -"+"->" + n +
  $(".playlist-landing .yt-uix-tile-link").filter(function(){ return this.innerText.indexOf("PHP") !== -1 }).map(function(i, e){
  return '<li>' + n + '\t<a class="video_es" href="'+e.href.replace(/&.*/,"")+'" target="_blank">' + e.innerText.replace("Tutorial PHP - ","").replace(/ en PHP ?| mediante PHP/,"") + "</a>" + n + "</li>"
  }).get().join(n);

  // ::::Otro ejemplo para lista Ruby de Youtube:

  var n = "\r\n";
"<!-"+"- Extraido desde " + String(document.location) + " -"+"->" + n +
$(".playlist-landing .yt-uix-tile-link").map(function(i, e){
return '<li>' + n + '\t<a class="video_es" href="'+e.href.replace(/&.*/,"")+'" target="_blank">' + e.innerText.replace('Tutorial Ruby ','') + "</a>" + n + "</li>"
}).get().join(n);
 
  // ::::Con este javascript (jQuery) saco resultados de Google

  var $$$ = jQuery;
  var n = "\r\n";
    "<!-"+"- Extraido desde " + String(document.location) + " -"+"->" + n + $$$(".g").map(function(){ return '<li>'+ n +'\t<a class="doc" href="' + $$$(this).find("a:first").prop("href") + '">' + $$$(this).find("a:first").text() + "</a>" + n + '</li>'}).get().join(n)
  -->
  </body>
</html>
<?php

ob_end_flush();

?>