<?php

/**
*
* Realiza la petición y devuelve los datos :)
*
* @author Zerquix18
* @version 0.1
*
**/

if( "POST" !== $_SERVER['REQUEST_METHOD'])
	exit();

if( ! isset($_POST['a_buscar']) || ! isset($_POST['busqueda']) ) 
	exit();

if( ! is_numeric($_POST['a_buscar']) or (int) $_POST['a_buscar'] > 2 ) 
	exit();


$busqueda = $_POST['busqueda'];

if( empty($busqueda) ) {
	echo '<div class="alert alert-danger"><b>Error:</b> No puedes dejar el campo vacío.</div>';
	exit();
}

switch($_POST['a_buscar']) {
	case "1":
	$error = '{"error":"Mouse not found"}';
	$ch = curl_init( sprintf("http://api.formice.com/mouse/stats.json?n=%s", $busqueda) );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$get = curl_exec($ch);
	curl_close($ch);
	$imagen = sprintf("http://transformicent.com/perfiles/usuario/%s", $busqueda);
	if( $get == $error ) {
		echo '<div class="alert alert-danger"><b>Error:</b> El ratón que buscas no existe...</div>';
    exit();
	}
              $staffTFMNT = array("Zerquix", "Escuiquirin", "Ratacp", "Discusion", "Geoorg", "Gastuu", "Leikektor",
                "Jroatm", "Candet", "Carcarmar", "Gaturrojefe");
              $staffTFM = array(
                  "admins" => array(
                        "Galaktine", "Kura", "Loukno", "Melibellule", "Sydoline", "Tigrounette", "Vanlu"
                    ),

                  "mods" => array(
                        "ES" => array("Ablebuci", "Arsinoa", "Asymptotee", "Bunniesmod", "Levols", "Modogrande",
                          "Modonoke", "Shyraa"),
                        "EN" => array("Amavauno", "Arcanacra", "Caitybumz", "Chrisbeer", "Devhyn", "Flipgraham",
                          "Harrytrotter", "Harshy", "Helmivene", "Katburger", "Moiety", "Rype", "Snarb", 
                          "Tetsuro", "Verkon"),
                        "FR" => array("Aewing", "Cryquinette", "Faraday", "Korsakofff", "Modoflore", "Modoloris",
                          "Modomaya", "Pheicas", "Modomino", "Jenfil", "Modopops", "Modorate", "Meoxie",
                          "Modothemis", "Modoxide", "Modozap", "Pikashu", "Modozore", "Thiht", "Violainator",
                          "Yoshun"),
                        "BR" => array("Coleandro", "Frapuccino", "Halfast", "Hippiw", "Kops", "Modhehehe",
                          "Pheio", "Randomod", "Roflzor", "Sramod", "Syarn", "Yroak")
                  ),
                  "centinelas" => array(
                        "Aguskyoko"
                    )
                );
            
            function es_tfmnt( $raton, $array ) {
                if( in_array($raton, $array) )
                  return true;
                
                return false;
            }
            function es_admin($raton, $array) {
                if( in_array( $raton, $array['admins']) )
                  return true;

                return false;
            }

            function es_mod($raton, $comunidad, $array) {
              switch($comunidad) {
                case "ES":
                if( in_array($raton, $array['mods']['ES'] ) )
                  return true;

                return false;
                break;
                case "EN":
                if( in_array($raton, $array['mods']['EN']) )
                  return true;

                  return false;
                break;
                case "FR":
                if( in_array($raton, $array['mods']['FR']) )
                  return true;

                return false;
                break;
                case "BR":
                if( in_array($raton, $array['mods']['BR']) )
                  return true;

                return false;
                break;
                default:
                return false;
                break;
              }

            }


		?>
    <h3>Detalles del ratón: <b>
      <?php
      $get = json_decode($get);
      $mouse = ucfirst( strtolower( $get->name ) );
      echo $mouse;
      if( es_tfmnt($mouse, $staffTFMNT) )
        echo ' <i>(Staff TransformiceNT)</i>';
      elseif( es_admin($mouse, $staffTFM))
        echo ' <i>(Administrador/a)</>';
      elseif( es_mod($mouse, "ES", $staffTFM) )
        echo ' <i>(Moderador/a ES)</i>';
      elseif( es_mod($mouse, "EN", $staffTFM) )
        echo ' <i>(Moderador/a EN)</i>';
      elseif( es_mod($mouse, "FR", $staffTFM) )
        echo ' <i>(Moderador/a FR)</i>'; 
      elseif( es_mod($mouse, "BR", $staffTFM) )
        echo ' <i>(Moderador/a BR)</i>';
      ?>
    </b></h3>
<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Imagen
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        <center><img class="thumbnail img-responsive imagen_busqueda" src="<?php echo $imagen ?>" /></center>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Datos
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
            <?php
            $ch = curl_init( sprintf("http://api.formice.com/mouse/stats.json?n=%s&l=es", $busqueda) );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $datos = json_decode( curl_exec($ch) );
            ?>
            <table class="table">
              <tr>
                <th>Nombre</th>
                <th>Tribu</th>
                <th>Título</th>
                <th>Rondas</th>
                <th>Quesos</th>
                <th>Quesos (como chamán)</th>
                <th>Quesos (como primero)</th>
                <th>Salvados</th>
                <th>Salvados (modo difícil)</th>
            <th>Bootcamps hechos</th>
            <th>Rango</th>
          </tr>
          <tr class="success">
            <td><a target="_blank" href="//cheese.formice.com/mouse/<?php echo strtolower($datos->name) ?>">
            <?php
              $raton = ucfirst( strtolower($datos->name) );

              echo $raton;

              
              ?></a></td>
            <td><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/buscar.php?t=' . $datos->tribe ?>" target="_blank"><?php echo $datos->tribe ?></a></td>
            <td><?php echo $datos->title ?></td>
            <td><?php echo $datos->rounds ?></td>
            <td><?php echo $datos->cheese ?></td>
            <td><?php echo $datos->sham_cheese ?></td>
            <td><?php echo $datos->first ?></td>
            <td><?php echo $datos->saves ?></td>
            <td><?php echo $datos->hard_saves ?></td>
            <td><?php echo $datos->bootcamps ?></td>
            <td><?php echo $datos->rank ?></td>
      </div>
    </div>
  </div>
</div>
<hr>
		<?php
	break;
	case "2":
	$error = '{"members":null}';
  $error2 = '{"error":"Tribe not found"}';
  $uri = "http://api.formice.com/tribe/members.json?t=" . base64_encode( $busqueda );
  $ch = curl_init( $uri );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $get = curl_exec( $ch );
  curl_close($ch);
  if( $error == $get || $error2 == $get) {
    echo '<div class="alert alert-danger"><b>Error:</b> La tribu que solicitas no existe.</div>';
    exit();
  }

    $datos = json_decode( $get );
    if( !empty($datos->founders) ) :
    foreach( $datos->founders as $f ) {
      $fundadores[] = $f;
    }
    endif;
    if( !empty($datos->members) ) :
    foreach( $datos->members as $m ) {
      $miembros[] = $m;
    }
    endif;
    ?>
    <h3>Detalles de la tribu: <a target="_blank" href="//cheese.formice.com/tribe/<?php echo $datos->tribe_name . "." . $datos->tribe_id ?>"><?php echo ucwords(strtolower($datos->tribe_name ))?></a></h3>
<hr><div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Tribu</h4>
    <b><p class="list-group-item-text" ><?php echo ucwords(strtolower($datos->tribe_name ))?></p></b>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">ID de la Tribu</h4>
    <p class="list-group-item-text"><b><?php echo $datos->tribe_id ?></b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Fundadores <?php if( isset($fundadores) ) : ?><span class="badge"><?php echo count( $fundadores ) ?></span><?php endif; ?></h4>
    <p class="list-group-item-text"><b><?php if(isset($fundadores) ) echo implode(', ', $fundadores ); else echo '<div class="alert alert-danger">Esta tribu no tiene fundadores</div>'; ?></b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Servidor</h4>
    <p class="list-group-item-text"><b><?php if(!empty($datos->server)) echo $datos->server; else echo '<div class="alert alert-danger">Esta tribu no tiene servidor</div>'; ?></b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Sala</h4>
    <p class="list-group-item-text"><b><?php  if( !empty($datos->room) ) echo $datos->room; else echo '<div class="alert alert-danger">Esta tribu no tiene sala</div>' ?></b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">En total...</h4>
    <p class="list-group-item-text"><b>
    Rondas <span class="badge"><?php echo $datos->rounds ?></span><br>
    Quesos <span class="badge"><?php echo $datos->cheese ?></span><br>
    Quesos de primero <span class="badge"><?php echo $datos->first ?></span><br>
    Quesos (como chamán) <span class="badge"><?php echo $datos->sham_cheese ?></span><br>
    Ratones salvados <span class="badge"><?php echo $datos->saves ?></span><br>
    Ratones salvados (modo difícil) <span class="badge"><?php echo $datos->hard_saves ?></span><br>
    </b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Rangos</h4>
    <p class="list-group-item-text"><b>
      Tribu <span class="badge"><?php echo $datos->rank ?></span><br>
      Rondas <span class="badge"><?php echo $datos->rounds_rank ?></span><br>
      Quesos (de primero, firsts) <span class="badge"><?php echo $datos->first_rank?></span><br>
      Quesos (como chamán) <span class="badge"><?php echo $datos->sham_cheese_rank ?></span><br>
      Bootcamps <span class="badge"><?php echo $datos->bootcamps_rank ?></span><br>
      Ratones salvados <span class="badge"><?php echo $datos->saves_rank ?></span><br>
      Ratones salvados (modo difícil) <span class="badge"><?php echo $datos->hard_saves_rank ?></span><br>
    </b></p>
  </a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Miembros <?php if( isset($miembros) ) : ?><span class="badge"><?php echo count($miembros) ?></span><?php endif; ?></h4>
    <p class="list-group-item-text"><b>
      <?php
      if( isset($miembros) ) :
        echo implode(", ", $miembros);
      else:
        echo '<div class="alert alert-danger">Esta tribu no tiene miembros</div>';
      endif;
      ?>
    </b></p>
  </a>
</div>
    <?php
  break;
}