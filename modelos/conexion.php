<?php 

class conexion{
	static public function conectar(){
		
		try{
			$link = new PDO('mysql:host=localhost; dbname=dgisistem','root','');
			//echo "conexión correcta";
			 $link ->exec("set names utf8");
			// var_dump($link);
			
			 return $link;
		}

		catch(Exception $e){
			echo "incorrecto la conexion";
		}
		
		
	}
}

