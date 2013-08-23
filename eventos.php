<?php
	session_start();
	$fecha_ini = $_REQUEST['fecha_ini'];
	$fecha_fin = $_REQUEST['fecha_fin'];
	
	$sql = "select * from eventos where CAST(fecha_hora AS DATE) BETWEEN STR_TO_DATE('$fecha_ini', '%c/%d/%Y') AND  STR_TO_DATE( '$fecha_fin', '%c/%d/%Y') order by fecha_hora";
	$_SESSION['sql'] = $sql;
	
	$_SESSION['fecha_ini'] = $fecha_ini;
	$_SESSION['fecha_fin'] = $fecha_fin;
	
	//$_SESSION['fecha_ini'] = $_REQUEST['fecha_ini'];
	//$_SESSION['fecha_fin'] = $_REQUEST['fecha_fin'];
    
	header("location:compra_de_entradas.php");
	
?>


