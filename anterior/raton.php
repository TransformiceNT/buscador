<?php
if( empty($_GET['raton']) ) {
	echo '<p class="vacio"><b>Escribe el nombre de un ratón...</b></p>';
}
$url = 'http://transformicent.com/perfiles/usuario/' . $_GET['raton'];
$url2 = 'http://api.formice.com/mouse/stats.json?n='. $_GET['raton'] . '&l=es';
$error = '{"error":"Mouse not found"}';
if(isset($_GET['raton']) && !empty($_GET['raton']) && @file_get_contents($url2) == $error){
	echo '<p class="noexiste"><b>El ratón no existe...</b></p>';
}elseif(isset($_GET['raton']) && !empty($_GET['raton']) ){
	echo '<img src="' . $url . '" title="Imagen del ratón: ' . ucfirst(strtolower($_GET['raton'])) . '" />';
}