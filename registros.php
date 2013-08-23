<?php
	session_start();
	$con = mysql_connect("mysql.codefactorycr.com:3306","web_a03804","patito4");
	if (!$con)
	{
		die('Error al conectarse a la base de datos: ' . mysql_error());
	}
	mysql_select_db("web_a03804", $con);
	
	$nombre = $_REQUEST["nombre"];
	$email = $_REQUEST["email"];
	$titulo = $_REQUEST["titulo"];
	$mensaje = $_REQUEST["mensaje"];
	
	$sql = "INSERT INTO libro_visitas (nombre, email, titulo, mensaje) VALUES ('$nombre', '$email', '$titulo', '$mensaje')";
    mysql_query($sql);
    	
	header("location:libro_de_visitas.php");
	
	mysql_close($con);
?>

