
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){
<!--  -->
			$item = "id";

			$valor = $this->idUsuario;

			echo "ver".$valor;

			 $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
			  echo json_encode($respuesta);
			 // var_dump($respuesta);
			//$myArr = array("John", "Mary", "Peter", "Sally","highlight_file","pedro",$item,$valor);
			//$myJSON = json_encode($myArr);
			//echo 'Hola mundo';
			//echo $myJSON;
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
// var_dump($_POST["idUsuario"]);

if(isset($_POST["idUsuario"])){
	//var_dump($_POST["idUsuario"]);
	// echo "bienn";
	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}
else{
	echo "ERROR";
}

<?php 
echo json_encode(['status'=>'failure', 'message'=>'No se enviar el post IDUSUER']);

// include ("../controladores/usuarios.controlador.php");
// include ("../modelos/usuarios.modelo.php");
// include ("../modelos/conexion.php");

// if (isset($_POST["iduser"])) {
// 	// var_dump($_POST["iduser"]);
//     $salida = array();
//     $salida["data_post"] = $_POST;
//     // $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["iduser"]."' LIMIT 1");
//     // $stmt->execute();
//     // $resultado = $stmt->fetchAll();
//   //   foreach($resultado as $fila){
//   //       $salida["nombre"] = $fila["nombre"];
//   //       $salida["usuario"] = $fila["usuario"];
//   //       // $salida["telefono"] = $fila["telefono"];
//   //       $salida["password"] = $fila["password"];
//   //       $salida["perfil"] = $fila["perfil"];
//   //       // $salida["foto"] = $fila["foto"];
//   //       $salida["estado"] = $fila["estado"];
//   //       $salida["ultimo_login"] = $fila["ultimo_login"];  //
// 		// $salida["fecha"] = $fila["fecha"];

//   //       // $salida["email"] = $fila["email"];
//   //       // if ($fila["imagen"] != "") {
//   //       //     $salida["imagen_usuario"] = '<img src="img/' . $fila["imagen"] . '"  class="img-thumbnail" width="100" height="50" /><input type="hidden" name="imagen_usuario_oculta" value="'.$fila["imagen"].'" />';
//   //       // }else{
//   //       //     $salida["imagen_usuario"] = '<input type="hidden" name="imagen_usuario_oculta" value="" />';
//   //       // }
//   //   }

//     echo json_encode($salida);
// }
// else{
// 	// echo "ERROR";
// 	echo json_encode(['status'=>'failure', 'message'=>'No se enviar el post IDUSUER']);
// }