<!DOCTYPE html>

<html>
	<head>
		<!--[if IE]>
      	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Aguafina+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="css/estilo_libro_de_visitas.css" rel="stylesheet" type="text/css" />
		<title> Libro de Visitas </title>
		<meta charset="utf-8"/>
		
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>
		<!--[if !IE]>
			<script type="text/javascript">
				
					nicEditors.findEditor('mensaje').setContent('');
					nicEditors.findEditor('mensaje').saveContent();
					alert("no estoy usando IE");
				
			</script>
		<![endif]-->
		<script type="text/javascript" src="js/funciones.js"></script>
		<!---->
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<!--<script src="js/libs/jquery-1.6.2.min.js"></script>-->
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" src="js/slides.min.jquery.js"></script>
		<script src="js/basic-jquery-slider.js"></script>
		<script type="text/javascript">
		 /* Basico */
		  $(document).ready(function(){
		  	
			/*nicEditors.findEditor('mensaje').setContent('');
			nicEditors.findEditor('mensaje').saveContent();*/
			
		  	
			$(".form").validate(
				{
					rules: {
						nombre: "required",
						email: {
							required: true,
							email: true
						},
						titulo:	"required",
						mensaje: "required"
					},
					messages: {
						nombre: "El campo Nombre no puede ir vacio",
						email: {
							email: "Por favor ingrese un formato valido de email",
							required: "Debe suministrar su correo electronico"
						},
						titulo: "El titulo no puede ir vacio",
						mensaje: "El mensaje no puede ir vacio"
					}
				}
			);
			$('#slideshow').bjqs({
				'width' : 300,
				'height' : 300,
				'showMarkers' : false,
				'showControls' : false,
				'centerMarkers' : true,
				'centerControls' : true
				
			});
		  });
		</script>
		
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
		
		
		<div class="libro_class"> 
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
		
		<div class="libro_class">
			<h2>LIBRO DE VISITAS</h2>
			
			<form class="form" name="form_visitas" method="post" action="registros.php"> 
				<p class="parrafo">
					<!--Nombre:--> 
					<label for="nombre">Nombre</label>
					<br/>
					<input type="text" name="nombre" id = "nombre" class="required"/>
					
					<span class="form_error" id="nombre_error"></span>
				</p>
				
				<p class="parrafo">
					<!--Email:--> 
					<label for="email">Email</label>
					<br/>
					<input type="text" name="email" id = "email"  class="email required"/>
					
					<span class="form_error" id="email_error"></span>
				</p>
				
				<p class="parrafo">
					<!--Titulo:-->
					<label for="titulo">Titulo</label>
					<br/>
					<input type="text" name="titulo" id = "titulo" class="required"/>
					
				</p>
				
				<div class = "editor_texto" >
					
					<!--Mensaje: -->
					<label for="mensaje">  Mensaje</label>
					<span class="form_error" id="texto_error"></span>
					<textarea name="mensaje" id="mensaje" class="required"></textarea>
					
					
				</div>
				
				<p>
					<input type="submit" value="Enviar" />
				</p>
				
			</form>
				
		</div>
		
		<div class="libro_class">
			<br />
			<br />
			<br />
			
			<?php 
			
				$con = mysql_connect("mysql.codefactorycr.com:3306","web_a03804","patito4");
				if (!$con)
				{
					die('Error al conectarse a la base de datos: ' . mysql_error());
				}
				mysql_select_db("web_a03804", $con);
				
				$sql = "SELECT * FROM libro_visitas";
				$result = mysql_query($sql);
				
				mysql_close($con);
				
				if( ( mysql_num_rows($result) ) != 0){
			?>
			
					<h3 class="libro_class">Registros del libro de visitas</h3>
					<table border="1">
						<tr>
							<td>Id </td>
							<td>Fecha y hora</td>
							<td>Email</td>
							<td>Titulo</td>
							<td>Mensaje</td>
						</tr>
					
						<?php
							while($row = mysql_fetch_array($result)) {
						?>
							  <tr>
							  <td><?php echo $row['id']; ?></td>
							  <td><?php echo $row['fecha_hora']; ?></td>
							  <td><?php echo $row['email']; ?></td>
							  <td><?php echo $row['titulo']; ?></td>
							  <td><?php echo $row['mensaje']; ?></td>
							  </tr>
						<?php
							}
						?>
					</table>
			<?php
				} 
				else { 
			?>
					<h3 class="libro_class" > No existen registros en el libro de visitas </h3>
			<?php
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