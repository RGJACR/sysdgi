<?php
	include ("../modelos/usuarios.modelo.php");
	include ("../controladores/usuarios.controlador.php");
	
	// include ("../modelos/conexion.php");
	// echo json_encode(['status'=>'failure', 'message'=>'No se enviar el post IDUSUER']);

// SI HAY EROR AHI TE SALDRA AL OTRO LADO EN EL JS el error que viste; yt este code es como el vardum()?, no nocesariaente, cuando ya desarrolles API tienes q especificar el error y mensaje para que el consuma sepa que valor no esta pasando. Pucha tio cualquier cosa ya sabes bro pucha no se como pagarte papu 
// gg esa vaina 3 dias my nada Jajaja tienes q tener cuidado, pienso que al estar aprendiendo de varios lugares te estas confundiendo 
// Entiendo bro un curso de ajax que recioemiendes
// AJAX en el desarrollo actual es consuma de API, puedes usar AXIOS que es una libreria q se usa el REACT.JS en angular tiene su propia libreira HttpModule
// entiendo bro pucha .... ya ps papu pucha avisas cuando tengas desarrollo en tu hato quizas xd es que para ver mis casos de paso xd tmr que sad bro en inter me veo full y  avcees me estanco en estas cosas gg
// ya  papu seguiré dandole bro pucha cualquier cosa avisas bro
// Ok, Lino esta viniendo a aprender, Irene tbm lo esta haciendo con Angular. talvez seria bueno q te unas con ellos y organices mejor tu codigo Que horarios va lino bro? en las mañanas a las 8 hasta las 4 o 5 pm Entiendo de 3 partir bro donde van? Es que ya tengo laptop que me compre esta beuno la alptop el otro esta en backend xd pero ya tengo laptop buena bro por eso ya puedo seguir
// Listo normal, en el mismo lugar ya bro mañana te visito me interesa php con ajax xd es que le tengo cariño a php bro xd 
// Angular con PHP si es posible// React con php tbm pienso que debes de manejar cualquier de esos para que organices mejor tu codigo en la actualizadad ya no se usa AJAX entiendo angular y php entonces bro --- Mañana te visitaré papu se puede? Normal, Ok habamlos tendre que seguir avanzandoGracias mano
if (isset($_POST["iduser"])) {
	// // var_dump($_POST["iduser"]);
    $salida = array();
    // $salida["data_post"] = $_POST;
    $stmt = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["iduser"]."' LIMIT 1");
    
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["id"] = $fila["id"];
        $salida["nombre"] = $fila["nombre"];
        $salida["usuario"] = $fila["usuario"];
        // $salida["telefono"] = $fila["telefono"];
        $salida["password"] = $fila["password"];
        $salida["perfil"] = $fila["perfil"];
        $salida["foto"] = $fila["foto"];
        $salida["estado"] = $fila["estado"];
        $salida["ultimo_login"] = $fila["ultimo_login"];  //
		$salida["fecha"] = $fila["fecha"];

        // $salida["email"] = $fila["email"];
        // if ($fila["imagen"] != "") {
        //     $salida["imagen_usuario"] = '<img src="img/' . $fila["imagen"] . '"  class="img-thumbnail" width="100" height="50" /><input type="hidden" name="imagen_usuario_oculta" value="'.$fila["imagen"].'" />';
        // }else{
        //     $salida["imagen_usuario"] = '<input type="hidden" name="imagen_usuario_oculta" value="" />';
        // }
    }

    echo json_encode($salida);
    // echo json_encode(['status'=>'success', 'message'=>'Si se enviar el post IDUSUER']);
}
else{
	// echo "ERROR";
	echo json_encode(['status'=>'failure', 'message'=>'No se enviar el post IDUSUER']);
}