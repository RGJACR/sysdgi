<?php 
require_once "conexion.php";

class ModeloUsuarios{
	
//////////////// Parte DOCENTE PRUEBA ////////////////////////////
	static public function MdlMostrarUsuarios($tabla, $item, $valor){

		if($item!=null){

			$sql = "SELECT * FROM $tabla WHERE $item = :item";
		// echo $sql;
			$stmt = conexion::conectar()->prepare($sql);

			$stmt->bindParam(":item", $valor , PDO::PARAM_STR);
			$stmt->execute();
		// AQUI SOLO RETORNA EL ETADO DE LA CONSULTA NO EL RESULTADO DESEADO

			$usuarios = [];
			while ($row = $stmt->fetch()) {
				array_push($usuarios, $row);		    
			}

			return $usuarios;
			$stmt ->close();
			$stmt = null;
		}
		else{
			$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt->fetchAll();
		}
		$stmt ->close();
		$stmt=null;
	}

	
	static public function mdlIngresarUsuario($tabla,$datos){

		$sql = "INSERT INTO $tabla (nombre,usuario,password,perfil,foto) VALUES (:nombre,:usuario,:password,:perfil,:foto)";

		$stmt = conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos['password'],PDO::PARAM_STR);
		$stmt -> bindParam(":perfil",$datos['perfil'],PDO::PARAM_STR);
		$stmt -> bindParam(":foto",$datos['ruta'],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
			echo "fallo";
		}
		$stmt ->close();
		$stmt = null;
	}

	static public function mdlEditarUsuario($tabla,$datos){

		$sql = "UPDATE $tabla SET nombre=:nombre,usuario=:usuario,password=:password,perfil=:perfil,foto=:foto WHERE id=:id";

		$stmt = conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":id",$datos['id'],PDO::PARAM_STR);
		$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos['password'],PDO::PARAM_STR);
		$stmt -> bindParam(":perfil",$datos['perfil'],PDO::PARAM_STR);
		$stmt -> bindParam(":foto",$datos['ruta'],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
			echo "fallo";
		}
		$stmt ->close();
		$stmt = null;
	}
////////////////////////////////////////////////////////////////////
//////////////////// PARTE DIRECTIVOS MADRE DE DIOS ////////////////
////////////////////////////////////////////////////////////////////
	static public function MdlMostrarUsuariosdirectivos($tabla, $item, $valor){

		if($item!=null){

			$sql = "SELECT * FROM $tabla WHERE $item = :item";
		// echo $sql;
			$stmt = conexion::conectar()->prepare($sql);

			$stmt->bindParam(":item", $valor , PDO::PARAM_STR);
			$stmt->execute();
		// AQUI SOLO RETORNA EL ETADO DE LA CONSULTA NO EL RESULTADO DESEADO

			$usuarios = [];
			while ($row = $stmt->fetch()) {
				array_push($usuarios, $row);		    
			}

			return $usuarios;
			$stmt ->close();
			$stmt = null;
		}
		else{
			$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt->fetchAll();
		}
		$stmt ->close();
		$stmt=null;
	}

	static public function mdlIngresardirectivo($tabla,$datos){

		$sql = "INSERT INTO $tabla (cm,nomie,nivel,dni,nombredirector,telefono,ugel,usuario,password,correo) VALUES (:cmdir,:nomie,:nivel,:dnidir,:nomdir,:telefonodir,:nuevoPerfildir,:usuariodir,:passworddir,:correodir)";

		$stmt = conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":cmdir",$datos['cmdir'],PDO::PARAM_STR);
		$stmt -> bindParam(":nomie",$datos['nomie'],PDO::PARAM_STR);
		$stmt -> bindParam(":nivel",$datos['nivel'],PDO::PARAM_STR);
		$stmt -> bindParam(":dnidir",$datos['dnidir'],PDO::PARAM_STR);
		$stmt -> bindParam(":nomdir",$datos['nomdir'],PDO::PARAM_STR);
		$stmt -> bindParam(":telefonodir",$datos['telefonodir'],PDO::PARAM_STR);
		$stmt -> bindParam(":nuevoPerfildir",$datos['nuevoPerfildir'],PDO::PARAM_STR);
		$stmt -> bindParam(":usuariodir",$datos['usuariodir'],PDO::PARAM_STR);
		$stmt -> bindParam(":passworddir",$datos['passworddir'],PDO::PARAM_STR);
		$stmt -> bindParam(":correodir",$datos['correodir'],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
			echo "fallo";
		}
		$stmt ->close();
		$stmt = null;
	}

	static public function mdlEditardirectivo($tabla,$datos){

		$sql = "UPDATE $tabla SET cm=:cm, nomie=:nomie, nivel=:nivel, dni=:dni, nombredirector=:nombredirector,telefono=:telefono,ugel=:ugel, password=:password, usuario=:usuario,correo=:correo WHERE id=:id";
		$stmt = conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":id",$datos['id'],PDO::PARAM_STR);
		$stmt -> bindParam(":cm",$datos['ecmdir'],PDO::PARAM_STR);
		$stmt -> bindParam(":nomie",$datos['enomie'],PDO::PARAM_STR);
		$stmt -> bindParam(":nivel",$datos['enivel'],PDO::PARAM_STR);
		$stmt -> bindParam(":dni",$datos['edni'],PDO::PARAM_STR);
		$stmt -> bindParam(":nombredirector",$datos['enomdir'],PDO::PARAM_STR);
		$stmt -> bindParam(":telefono",$datos['etelefonodir'],PDO::PARAM_STR);
		$stmt -> bindParam(":ugel",$datos['perfil'],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos['password'],PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos['eusuariodir'],PDO::PARAM_STR);
		$stmt -> bindParam(":correo",$datos['correo'],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
			echo "fallo";
		}
		$stmt ->close();
		$stmt = null;
	}
}

