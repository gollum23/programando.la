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

function printMenu($wiki, $pagOficial=''){

  if(!empty($pagOficial)){
    $pagOficial = '<a class="btn btn_docs" target="_blank" href=' . $pagOficial . '>Pagina oficial</a>';
  }

  echo 
  '<p>
    <a class="btn btn_video_es" href="#">Vídeos en Español</a>
    <!-- <a class="btn btn_video_en" href="#">Videos en Ingles</a> -->
  </p>
  <p class=text_links>
    <a class="btn" href="http://es.wikipedia.org/wiki/'.$wiki .'" target="_blank">Wikipedia</a>
    <a class="btn btn_doc" href="#">Documentos</a>' . $pagOficial .'</p>';
}

function printList($file){
  $source = readfile('source/' . $file . '.html');
}
?>