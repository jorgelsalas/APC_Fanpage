<!DOCTYPE html>
<? 
	session_start();
	if(!isset($_SESSION['sql'])){
		$_SESSION['sql'] = NULL;
	}
	
	
?>


<html>
	<head>
		<!--[if IE]>
      	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Aguafina+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		
		
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
		<link href="css/estilo_compra_de_entradas.css" rel="stylesheet" type="text/css" />
		<title> Compra de Entradas </title>
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>		
		<script type="text/javascript">
		 /* Basico */
		  $(document).ready(function(){
			$("#compra_entradas").validate(
				{
					messages: {
						fecha_ini: "La fecha inicial no puede ir vacia",
						fecha_fin: "La fecha final no puede ir vacia"
					}
				}
			);
			//( $("#fecha_ini").datepicker( "option", "minDate" ) )
			$("#fecha_ini").datepicker({
					onSelect: function( selectedDate ) {
						$( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
					}
				}
			);
			$("#fecha_fin").datepicker({
					onSelect: function( selectedDate ) {
						$( "#fecha_ini" ).datepicker( "option", "maxDate", selectedDate );
					}
				}
			);
			//$("#fecha_ini").datepicker({
			//  onSelect: function(dateText, inst) { $("#fecha_fin").datepicker( "option", "minDate",  dateText ); }
			//});
			
		  });
		</script>
		<meta charset="utf-8"/>
		
	</head>
	
	<body>
		<div class = "cabecera">
			<a href="index.html"><img src="img/PerfectCircle.jpg" alt="logoAPC"/> </a>
			<h1>A PERFECT CIRCLE</h1>
			<h2>Fan Page</h2>
			<h3>Bienvenido, esperamos que esta página sea de su agrado.</h3>
		</div>
		
		<br/>
		<br/>
		
		<div class = "compra_class">
			
			<div class = "compra_class"> 
				<ul id = "menu_principal"> 
					<li> <a class="menu_anchor1" href="index.html"> Home </a> </li>
					<li> <a class="menu_anchor1" href="biografia.html"> Biografía </a> </li>
					<li> <a class="menu_anchor1" href="discografia.html"> Discografía </a> </li>
					<li> <a class="menu_anchor1" href="media.html"> Media </a> </li>
					<li id = "menu_principal2"> <a class="menu_anchor2" href="proximos_conciertos.html"> Próximos Conciertos </a> </li>
					<li> <a class="menu_anchor2" href="libro_de_visitas.php"> Libro de Visitas </a> </li>
					<li id = "menu_principal2"> <a class="menu_anchor2" href="compra_de_entradas.php"> Compra de Entradas </a> </li>
					<li> <a class="menu_anchor1" href="foro/CodeIgniter_2.1.2/index.php"> Foro </a> </li>
				</ul>
			</div>
			
	
			<h2>COMPRA DE ENTRADAS</h2>
	
			<br/>
			
			<h4>Lo sentimos, esta sección se encuentra en construcción</h4>
			
			<form id ="compra_entradas" method="post" action="eventos.php">
				<table>
					<tr>
						<td>
							<label>Fecha inicial</label>
						</td>
						<td>
							<input <?php if ($_SESSION['fecha_ini'] != NULL) { ?> value = <?php echo $_SESSION['fecha_ini']; ?> <?php } ?> type="text" id="fecha_ini" name="fecha_ini" class="date required" size="25"/>
						</td>						
					</tr>
					
					<tr>
						<td>
							<label>Fecha final</label>
						</td>
						<td>
							<input <?php if ($_SESSION['fecha_fin'] != NULL) { ?> value = <?php echo $_SESSION['fecha_fin']; ?> <?php } ?> type="text" id="fecha_fin" name="fecha_fin" class="date required" size="25"/>
						</td>						
					</tr>
					<tr>
						<td colspan ="2">
							<input class="submit" type="submit" value="Consultar"/>
						</td>
					</tr>
				</table>
			</form>
			
		</div>
		
				
		<div class = "compra_class">
			
			<?php 
				if ($_SESSION['sql'] != NULL) {
					$con = mysql_connect("mysql.codefactorycr.com:3306","web_a03804","patito4");
					if (!$con)
					{
						die('Error al conectarse a la base de datos: ' . mysql_error());
					}
					mysql_select_db("web_a03804", $con);
					
					$result = mysql_query($_SESSION['sql']);
					
					$_SESSION['result'] = $result;
					
					mysql_close($con);
				
					if( ( mysql_num_rows($result) ) != 0){
			?>
						<h3> <?php Echo "Fecha inicio: " . $_SESSION['fecha_ini'].  " Fecha fin: " . $_SESSION['fecha_fin']; ?></h3>
						<h3>Eventos en las fechas solicitadas</h3>
						<table id= "resultados" border="1">
							<tr>
								<td>Id Evento</td>
								<td>Fecha y hora</td>
								<td>Lugar</td>
								<td>Precio</td>
							</tr>
						
						<?php
							while($row = mysql_fetch_array($result)) {
						?>
							  <tr>
							  <td><?php echo $row['id']; ?></td>
							  <td><?php echo $row['fecha_hora']; ?></td>
							  <td><?php echo $row['lugar']; ?></td>
							  <td><?php echo $row['precio']; ?></td>
							  </tr>
						<?php
							}
						?>
						</table>
				<?php
					}
					else {
				?>
				<h3> No hay resultados disponibles para las fechas elegidas </h3>
				<?php
					}
				?>
			<?php
					$_SESSION['sql'] = NULL;
					$_SESSION['fecha_ini'] = NULL;
					$_SESSION['fecha_fin'] = NULL;
				}
			?>
		</div>
		
		<div class="pie">
			<footer>
				<ul id = "menu_footer"> 
					<li> <a href="index.html"> Home </a> </li>
					<li> <a href="biografia.html"> Biografía </a> </li>
					<li> <a href="discografia.html"> Discografía </a> </li>
					<li> <a href="media.html"> Media </a> </li>
					<li> <a href="proximos_conciertos.html"> Próximos Conciertos </a> </li>
					<li> <a href="libro_de_visitas.php"> Libro de Visitas </a> </li>
					<li> <a href="compra_de_entradas.php"> Compra de Entradas </a> </li>
					<li> <a href="foro/CodeIgniter_2.1.2/index.php"> Foro </a> </li>
				</ul>
			</footer>
		</div>

		
	</body>
</html>