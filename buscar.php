<?php
/**
* Buscador de ratones de TransformiceNT
*
* Puedes editarlo, pero sin quitar el copyright.
* @author Zerquix18
* @version 0.1
*
**/

function acerca_de() { ?>
<center><h2>Acerca del buscador de TransformiceNT</h2></center><hr>
<p><b>¿Qué es el buscador?</b></p>
<p>Es un proyecto (próximamente de código abierto) creado por <a href="//zerquix18.com/" target="_blank">Zerquix18</a>
	utilizando el medio de la API de <a href="//cheese.formice.com/" target="_blank">cheese.formice.com</a>
	para obtener datos de Tribus y Ratones de Transformice.</p>
<p><b>¿Cómo está hecho el buscador?</b></p>
<p>Está hecho en <b>PHP</b>. El HTML, CSS y JavaScript provienen de <a target="_blank" href="//getbootstrap.com/">
	Bootstrap</a>.</p>
<p><b>Métodos para usar el buscador</b></p>
<ul>
	<li><b>POST</b>. <i>Ingresa los datos en el campo de búsqueda y elige lo que quieras buscar</i>.
	<li><b>GET</b>. <i>Añade a la URL peticiones vía GET. Para ratones: <b><a target="_blank" href="buscar.php?r=Zerquix">?r=nombredelraton</a></b>, <b><a target="_blank" href="buscar.php?raton=Zerquix">?raton=nombredelraton</a></b>. Para tribus: <b><a target="_blank" href="buscar.php?t=Werneck+Darex">?t=nombredelatribu</a></b>, <b><a target="_blank" href="buscar.php?tribu=Werneck+Darex">?tribu=nombredelatribu</a></b>.</p></p>
</ul>
<p><b> Agradecimientos especiales </b></p>
<ul>
	<li><b>SuperJD10</b>. <i>Él hizo la imagen visible en el buscador de ratones</i>.
	<li><b>API de CheeseForMice</b>. <i>Por ayudar con la obtención de los datos de los ratones y tribus</i>.
	<li><b>Testers</b>. <i>Por probar el código en la fase beta</i>.
</ul>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf8">
	<meta author="Zerquix18">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="title" content="Buscador de ratones y tribus de Transformice">
	<meta name="keywords" content="buscador de ratones, buscador tribus, buscador ratones, buscar ratones, transformice, transformicent">
	<meta name="description" content="Buscador de ratones y tribus de Transformice, por TransformiceNT.">
	<title> Buscador de ratones y tribus de Transformice </title>
	<link rel="stylesheet" href="http://bootswatch.com/slate/bootstrap.min.css">
	<link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="shortcut icon" href="buscar.ico">
	<style type="text/css">
	body {
		padding-top: 60px;
		padding-left: 20px;
		padding-right: 20px;
	}
	#resultado, .imagen_busqueda {
		text-align: center;
		float: center;
	}
	h2.bienvenida {
		color: #BABD2F;
	}
	legend.busqueda {
		color: #C2C2DA;
	}
	span.ayuda {
		color: #2ECF73;
	}
	</style>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
  <div class="container">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="buscar.php" class="navbar-brand">Buscador</a>
    <div class="nav-collapse collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="//transformicent.com/">Ir al sitio</a>
        </li>
        <li <?php if('about' ==  $_SERVER['QUERY_STRING']) echo 'class="active"' ?>><a href="buscar.php?about">Acerca de</a></li>
        <li><a href="anterior/buscar.php">Versión anterior</a></li>
      </ul>
      <p class="navbar-text" style="float:right; color: #BABD2F;">Hecho vía TransformiceNT</p>
    </div>
  </div>
</div>
<?php if( 'about' == $_SERVER['QUERY_STRING']): acerca_de(); exit(); endif; ?>
<center><h2 class="bienvenida">Bienvenido/a al buscador de ratones y tribus</h2></center><br><br>

<legend class="busqueda">Realiza tu búsqueda</legend>
<form method="post">
  <div class="col-lg-4">
    	<input type="text" class="form-control" placeholder="Ratón o tribu" name="busqueda" <?php if("POST" == $_SERVER['REQUEST_METHOD'] )
			echo 'value="' . ucwords($_POST['busqueda']) . '"';
			elseif( isset($_GET['r']) )
				echo 'value="' . ucwords($_GET['r']) . '"';
			elseif( isset($_GET['raton']) )
				echo 'value="'. ucwords($_GET['raton']) . '"';
			elseif( isset($_GET['t']) )
				echo 'value="' . ucwords($_GET['t']) . '"';
			elseif( isset($_GET['tribu']) )
				echo 'value="' . ucwords($_GET['tribu']) . '"';
    	?>>

    	<?php 
    		function select($donde) {
    			switch($donde) {
    				case "r":
    				if( isset($_POST['raton_o_tribu']) && (integer) $_POST['raton_o_tribu'] == 1 or isset($_GET['r']) && !empty($_GET['r']) or isset($_GET['raton']) && !empty($_GET['raton']) ) {
    					return 'selected ="selected"';
    				}
    				break;
    				case "t":
    				if( isset($_POST['raton_o_tribu']) && (int) $_POST['raton_o_tribu'] == 2  or isset($_GET['t']) && !empty($_GET['t']) or isset($_GET['tribu']) && !empty($_GET['tribu']) ) {
    					return 'selected ="selected"';
    				}
    				break;
    			}
    		}
    	?>
    	<select name="raton_o_tribu" id="raton_o_tribu" class="form-control">
    		<option value="0">Seleccionar</option>
    		<option value="1" <?php echo select('r') ?>>Ratón</option>
    		<option value="2" <?php echo select('t') ?>>Tribu</option>
    	</select/>
   		 <span class="help-block ayuda">¿Qué estás buscando? Tenemos dos opciones, ratón o tribu</span>
	</div>
	<input type="submit" class="btn btn-danger" value="Buscar">
</form><br><br><br><br><br><hr>
<div id="resultado">
	<?php
	function buscar($busqueda) {
		$metodo = (integer) $busqueda['a_buscar'];

		if( ! is_numeric($busqueda['a_buscar']) )
				return "Recuerda: No intentes ser cabrón con alguien más cabrón que tú. No edites el source.";
		elseif( $metodo > 2)
				return "Recuerda: No intentes ser cabrón con alguien más cabrón que tú. No edites el source.";
		elseif( $busqueda['a_buscar'] == "0" )
				return '<div class="alert alert-danger">Debes elegir algo a buscar.</div>';
		
		$u = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/busqueda.php';
		$ch = curl_init( $u );
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $busqueda);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$resultado = curl_exec($ch);
		curl_close($ch);
		return $resultado;
	}

	if("POST" == $_SERVER['REQUEST_METHOD']) {
		$data = array("busqueda" => stripslashes($_POST['busqueda']), "a_buscar" => $_POST['raton_o_tribu']);
		$footer = true;
		echo buscar( $data );
	}elseif( isset($_GET['r']) ) {
		$data = array("busqueda" => stripslashes($_GET['r']), "a_buscar" => "1");
		$footer = true;
		echo buscar( $data );
	}elseif( isset($_GET['raton']) ) {
		$data = array("busqueda" => stripslashes($_GET['raton']), "a_buscar" => "1");
		$footer = true;
		echo buscar( $data );
	}elseif( isset($_GET['tribu']) ) {
		$data = array("busqueda" => stripslashes($_GET['tribu']), "a_buscar" => "2");
		$footer = true;
		echo buscar( $data );
	}elseif( isset($_GET['t']) ) {
		$data = array("busqueda" => stripslashes($_GET['t']), "a_buscar" => "2");
		$footer = true;
		echo buscar( $data );
	}
	?>

</div>
<?php if( ! isset($footer) )
	echo 'Hecho por <a target="_blank" href="//twitter.com/Zerquix18">Zerquix18</a>';
?>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</body>
</html>