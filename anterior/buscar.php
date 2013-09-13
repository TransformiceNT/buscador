<!DOCTYPE html>
<html lang="es">
<head>
	<style type="text/css">
	body {
		background: url("http://i.imgur.com/1kqKhc7.png");
	}
	.perfiles {
		color: #a9ad31;
		margin-top: 5px;
		text-shadow: 3px 5px 2px #0d1b1d;
		text-align: center;
	}
	div.raton {
		border-color: #2d626a;
		border-style: solid;
		border-width: 20px;
		margin-top: 50px;
		width: 600px;
		height: 400px;
		border-radius: 15px;
	}
	.nombre_raton {
		color: #000000;
		border-radius: 5px;
		width: 300px;
		height: 20px;
	}
	.vacio {
		color: #A3B5FF;
		padding: 50px;
		font-size: 50px;
	}
	footer {
		color: #FFFFFF;
		font-size: 20px;
		text-align: center;
		/* be happy... */
	}
	.noexiste {
		color: #FF0000;
		font-size: 50px;
		padding: 50px;
	}
	a.jd {
		color: #A2DB1A;
		text-decoration: none;
	}
	a.zer {
		color: #FF1010;
		text-decoration: none;
	}
	a.jd:hover, a.zer:hover {
		text-decoration: underline;
	}
	.enviar {
		color: red;
		border-style: ridge;
		width: 60px;
		height: 25px;
		border-radius: 10px;
		border-color: white;
		border-width: 3px;
	}
	.enviar:hover {
		background-color: #DCD5D5;
	}
	.enviar:visited {
		background-color: #D4C8C8;
	}
	</style>
	<title> Perfiles TransformiceNT </title>
	<meta charset="utf-8">
	<script>
function mostrarData(str) {
if(window.XMLHttpRequest) {
  xmlhttp = new XMLHttpRequest();
  }else{
  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("raton").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","raton.php?raton=" + str, true);
xmlhttp.send();
}
</script>
<meta name="Author" content="Zerquix18">
<meta name="title" content="Buscador de ratones - TFMNT">
<meta name="description" content="Buscador de ratones oficial de TransformiceNT creado por Zerquix18 & SuperJD10">
</head>
<body>
	<p class="perfiles"><img src="http://i.imgur.com/kh825do.png" /></p>
	<img src="http://i.imgur.com/trvvciQ.png"> <br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="raton" class="nombre_raton" onkeyup="mostrarData(this.value)" value="<?php if(isset($_POST['raton']) ) echo $_POST['raton']; elseif(isset($_GET['raton']) ) echo $_GET['raton']; ?>">
	<input type="submit" name="enviar" id="enviar" value="Enviar" class="enviar">
</form>
	<div class="raton" id="raton">
		<?php if('POST' == $_SERVER['REQUEST_METHOD']) {
			$raton = (isset($_POST['raton'])) ? $_POST['raton'] : null;
			echo file_get_contents('http://transformicent.com/perfiles/raton.php?raton=' . $raton);
		}elseif( isset($_GET['raton'])) {
			echo file_get_contents('http://transformicent.com/perfiles/raton.php?raton=' . $_GET['raton']);
		}else{
			echo '<center><a href="../buscar.php">Ve a la última versión</a></center>';
		}
		?>
	</div>
	<br>
	<footer>
		Hecho por <a target="_blank" href="http://twitter.com/Zerquix18" class="zer">Zerquix18</a> &amp; <a href="//twitter.com/superjd10"
		target="_blank" class="jd">SuperJD10</a> con la ayuda de la API de CheeseForMice.
	</footer><hr><br>
	<center><a href="//fb.com/tfmnt"><img src="http://i.imgur.com/3CKPPQe.png"></a></center>
</body>
</html>