<?php 

class ControladorUsuarios{
//////////////// Parte DOCENTE PRUEBA 1////////////////////////////
	static public function ctrIngresar(){
		if (isset($_POST['ingUsuario'])) {
			// code...
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])) 
			{
				// code...
				$tabla = "usuarios";
				$item = "usuario"; 
				$valor = $_POST['ingUsuario'];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
				//aca es el array
				if(count($respuesta) > 0){
					// SI HAY CONTENIDO EN EL ARRAY SI EXISTE EL USUARIO
					$usuario = $respuesta[0];
					if ($usuario['usuario']==$_POST['ingUsuario']&&$usuario['password']==$_POST['ingPassword']) 
					{
						// code...
					
						$_SESSION['iniciarsesion']="ok";

						$_SESSION['nombre']=$usuario['nombre'];
						$_SESSION['usuario']=$usuario['usuario'];
						$_SESSION['foto']=$usuario['foto'];
						$_SESSION['perfil']=$usuario['perfil'];

						var_dump($_SESSION['nombre']);



						echo '<script>
								window.location = "inicio";
							  </script>';
						
						
					}else{
						echo("<div class='alert-danger'>Datos incorrectos</div>");
					}
				}else{
					echo("<div class='alert-danger'>No existe el usuario</div>");
				}
				/*
				if ($respuesta['usuario']==$_POST['ingUsuario']&&$respuesta['password']==$_POST['ingPassword']) 
				{
					// code...
				
					$_SESSION['iniciarsesion']="ok";

					echo '<script>
							window.location = "inicio";
						  </script>';

				}

				else
				{
					echo("<div class='alert-danger'>Error al ingresar al sistema</div>");
				}*/
			}
			else{
				echo("<div class='alert-danger'>Tienes espacios tu usuario o contraseña</div>");
			}
		}
	}

	static public function ctrCrearUsuario(){

			if(isset($_POST['nuevoUsuario'])){
				if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/',$_POST['nuevoNombre'])&&
					preg_match('/^[a-zA-Z0-9]+$/',$_POST['nuevoUsuario'])&&
					preg_match('/^[a-zA-Z0-9]+$/',$_POST['nuevoPassword'])){

				// $_FILES se puede imprimir con un var_dump para ver la dirección el archivo temporal
				// Realizar el recorte de la imagen a 500x500, crear la carpeta y gardar la imagen dependiendo si es jpg o png con el siguiente código
						$ruta="";

					 // var_dump($_FILES['nuevaFoto']['name']);
					 // 

				if($_FILES['nuevaFoto']['name']==""){
					echo "la imagen esta vacia";
					// //Crear directorio
					// $directorio = "vistas/img/usuarios/".$_POST['nuevoUsuario'];
					// mkdir($directorio,0755);
					// vistas/img/usuarios/24698261/975.png
				}

				else{
					echo "contiene img";
					if(isset($_FILES['nuevaFoto']['tmp_name'])){
						list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
						$nuevoancho = 500;
						$nuevoalto = 500;
				//Crear directorio

						$directorio = "vistas/img/usuarios/".$_POST['nuevoUsuario'];
						mkdir($directorio,0755);

						if($_FILES['nuevaFoto']['type']=="image/jpeg"){
							$aleatorio = mt_rand(100,999);
							$ruta = $directorio."/".$aleatorio.".jpg";

							// var_dump($_FILES['nuevaFoto']['tmp_name']);  

							$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagejpeg($destino,$ruta);
						}
						if($_FILES['nuevaFoto']['type']=="image/png"){
							$aleatorio = mt_rand(100,999);
							$ruta = $directorio."/".$aleatorio.".png";
							$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagepng($destino,$ruta);
						}
					}	
				}

				$tabla = "usuarios";
					//$salt = md5($_POST['nuevoPassword']);
					//$passwordEncriptado = crypt($_POST['nuevoPassword'],$salt);
					$datos = array("nombre"=>$_POST['nuevoNombre'],
									"usuario"=>$_POST['nuevoUsuario'],
									"password"=>$_POST['nuevoPassword'],
									"perfil"=>$_POST['nuevoPerfil'],
									"ruta"=>$ruta);

					$respuesta  = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

					if($respuesta=="ok"){
						echo ("<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡Registro Exitoso!',
								icon: 'success',
								confirmButtonText:'Ok'
								});
								</script>");
					}
				}

				else{
					echo ("<script>
							Swal.fire({ 
								title: 'Error!',
								text: '¡No puedes usar caraceres especiales en el campo usuario ni en la contraseña!',
								icon: 'error',
								confirmButtonText:'Ok'
								});
						</script>");
				}
			}
		}

	static public function ctrMostrarUsuarios($item,$valor){
	$tabla="usuarios";
	$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item,$valor);
	return $respuesta;
	}

	static public function ctrEditarUsuario(){
		
		// var_dump($_POST['car']);
		// var_dump($_POST['editarUsuarioss']);

		if(isset($_POST['nuevouser']))
		{
			if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/',$_POST['editarNombre']))
			{

				$ruta=$_POST['fotoActual'];
				if(isset($_FILES['editarFoto']['tmp_name'])&&!empty($_FILES['editarFoto']['tmp_name']))
				{

					list($ancho, $alto) = getimagesize($_FILES['editarFoto']['tmp_name']);
					$nuevoancho = 500;
					$nuevoalto = 500;

						//Crear directorio

					$directorio = "vistas/img/usuarios/".$_POST['nuevouser'];
						//Si ya exiiste foto se debe eliminar

					if(!empty($_POST['fotoActual']))
					{
						unlink($_POST['fotoActual']);
					}
					else
					{
						mkdir($directorio,0755);
					}


						//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

					if($_FILES['editarFoto']['type']=="image/jpeg"){

						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagejpeg($destino,$ruta);
					}
					if($_FILES['editarFoto']['type']=="image/png"){

						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES['editarFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagepng($destino,$ruta);
					}

				}

				$tabla = "usuarios";
				if($_POST['editarPassword']!="")
				{
					if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['editarPassword'])){
						// $salt = md5($_POST['editarPassword']);
						// $passwordEncriptado = crypt($_POST['editarPassword'],$salt);
						$passwordEncriptado = $_POST['editarPassword'];
					}
					else{
						echo"<script>
						Swal.fire({ 
							title: 'Error!',
							text: '¡No puedes usar caraceres especiales en el campo contraseña!',
							icon: 'error',
							confirmButtonText:'Ok'
							});
							</script>";
						}
						
				}

				else
				{
						$passwordEncriptado = $_POST['passwordActual'];
				}

					$datos = array("nombre"=>$_POST['editarNombre'],
						"id"=>$_POST['idusers'],
						"usuario"=>$_POST['nuevouser'],
						"password"=>$passwordEncriptado,
						"perfil"=>$_POST['editarPerfil'],
						"ruta"=>$ruta);

					$respuesta  = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
					if($respuesta=="ok")
					{
						echo"<script>
						Swal.fire({ 
							title: 'Success!',
							text: '¡El usuario ha sido actualizaddo correctamente!',
							icon: 'success',
							confirmButtonText:'Ok'
							}).then((result)=>{
								if(result.value){
									window.location = 'docente';
								}
								})
								</script>";
							}
			}
						else{
							echo"<script>
							Swal.fire({ 
								title: 'Error!',
								text: '¡No puedes usar caraceres especiales en el campo nombre!',
								icon: 'error',
								confirmButtonText:'Ok'
								})
								</script>";
							}
			echo "Biensdaasd";
		}
		// else{
		// 	echo "NO existe la variable";
		// }
	}
////////////////////////////////////////////////////////////////////
//////////////////// PARTE DIRECTIVOS MADRE DE DIOS ////////////////
////////////////////////////////////////////////////////////////////

	static public function ctrCrearUsuariodirectivo(){

		if(isset($_POST['cmdir'])){
			// $_FILES se puede imprimir con un var_dump para ver la dirección el archivo temporal
			// Realizar el recorte de la imagen a 500x500, crear la carpeta y gardar la imagen dependiendo si es jpg o png con el siguiente código
			// $ruta="";

			 // var_dump($_FILES['nuevaFoto']['name']);
			 // 

			// if($_FILES['nuevaFoto']['name']==""){
			// 	echo "la imagen esta vacia";
			// 		// //Crear directorio
			// 		// $directorio = "vistas/img/usuarios/".$_POST['nuevoUsuario'];
			// 		// mkdir($directorio,0755);
			// 		// vistas/img/usuarios/24698261/975.png
			// }

			// else{
				// echo "contiene img";
			// 	if(isset($_FILES['nuevaFoto']['tmp_name'])){
			// 		list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
			// 		$nuevoancho = 500;
			// 		$nuevoalto = 500;
			// 	//Crear directorio

			// 		$directorio = "vistas/img/usuarios/".$_POST['nuevoUsuario'];
			// 		mkdir($directorio,0755);

			// 		if($_FILES['nuevaFoto']['type']=="image/jpeg"){
			// 			$aleatorio = mt_rand(100,999);
			// 			$ruta = $directorio."/".$aleatorio.".jpg";

			// 				// var_dump($_FILES['nuevaFoto']['tmp_name']);  

			// 			$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
			// 			$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
			// 			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
			// 			imagejpeg($destino,$ruta);
			// 		}
			// 		if($_FILES['nuevaFoto']['type']=="image/png"){
			// 			$aleatorio = mt_rand(100,999);
			// 			$ruta = $directorio."/".$aleatorio.".png";
			// 			$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
			// 			$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
			// 			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
			// 			imagepng($destino,$ruta);
			// 		}
			// 	}	
			// // }

			$tabla = "directivos";
					//$salt = md5($_POST['nuevoPassword']);
					//$passwordEncriptado = crypt($_POST['nuevoPassword'],$salt);
			$datos = array("edir"=>$_POST['edir'],	
				"cmdir"=>$_POST['cmdir'],
				"nomie"=>$_POST['nomie'],
				"nivel"=>$_POST['nivel'],
				"dnidir"=>$_POST['dnidir'],
				"nomdir"=>$_POST['nomdir'],
				"telefonodir"=>$_POST['telefonodir'],
				"nuevoPerfildir"=>$_POST['nuevoPerfildir'],
				"usuariodir"=>$_POST['usuariodir'],
				"passworddir"=>$_POST['passworddir'],
				"correodir"=>$_POST['correodir']);

			$respuesta  = ModeloUsuarios::mdlIngresardirectivo($tabla, $datos);

			if($respuesta=="ok"){
				echo ("<script>
					Swal.fire({ 
						title: 'Success!',
						text: '¡Registro Exitoso!',
						icon: 'success',
						confirmButtonText:'Ok'
						});
						</script>");
			}

			else{
				echo ("<script>
					Swal.fire({ 
						title: 'Error!',
						text: '¡No se guardaron los datos',
						icon: 'error',
						confirmButtonText:'Ok'
						});
						</script>");
			}
		}

		

		// else{
		// 	echo ("<script>
		// 		Swal.fire({ 
		// 			title: 'Error!',
		// 			text: 'No esta v',
		// 			confirmButtonText:'Ok'
		// 			});
		// 			</script>");
		// }

	}

	static public function ctrmostrarUsuariosdirectivo($item,$valor){
		$tabla="directivos";
		$datas = ModeloUsuarios::MdlMostrarUsuariosdirectivos($tabla, $item,$valor);
		return $datas;
	}

	static public function ctrEditardirectivo(){
		
		// var_dump($_POST['car']);
		// var_dump($_POST['editarUsuarioss']);

		if(isset($_POST['edir']))
		{

				$tabla = "directivos";
				
				if($_POST['epassworddir']!="")
				{
					if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['epassworddir'])){
						// $salt = md5($_POST['editarPassword']);
						// $passwordEncriptado = crypt($_POST['editarPassword'],$salt);
						$passwordEncriptado = $_POST['epassworddir'];
					}
					else{
						echo"<script>
						Swal.fire({ 
							title: 'Error!',
							text: '¡No puedes usar caraceres especiales en el campo contraseña!',
							icon: 'error',
							confirmButtonText:'Ok'
							});
							</script>";
						}
						
				}

				else
				{
						$passwordEncriptado = $_POST['epassworddir'];
				}

					$datos = array("id"=>$_POST['edir'],
						"ecmdir"=>$_POST['ecmdir'],
						"enomie"=>$_POST['enomie'],
						"enivel"=>$_POST['enivel'],
						"edni"=>$_POST['ednidir'],
						"enomdir"=>$_POST['enomdir'],
						"etelefonodir"=>$_POST['etelefonodir'],
						"perfil"=>$_POST['enuevoPerfildir'],
						"password"=>$passwordEncriptado,
						"eusuariodir"=>$_POST['eusuariodir'],
						"correo"=>$_POST['eorreodir']);

					$respuesta  = ModeloUsuarios::mdlEditardirectivo($tabla, $datos);
					if($respuesta=="ok")
					{
						echo"<script>
						Swal.fire({ 
							title: 'Success!',
							text: '¡El usuario ha sido actualizaddo correctamente!',
							icon: 'success',
							confirmButtonText:'Ok'
							}).then((result)=>{
								if(result.value){
									window.location = 'docente';
								}
								})
								</script>";
							}
			else{
				echo"<script>
				Swal.fire({ 
					title: 'Error!',
					text: '¡No puedes usar caraceres especiales en el campo nombre!',
					icon: 'error',
					confirmButtonText:'Ok'
					})
					</script>";
				}
				echo "Biensdaasd";
		}
		// else{
		// 	echo "NO existe la variable";
		// }
	}


}




