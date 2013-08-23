<!DOCTYPE html>
<html>
	<head>
		<!--[if IE]>
      	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Aguafina+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="<?= base_url().'../../css/estilo_libro_de_visitas.css'?>" rel="stylesheet" type="text/css" />
		
		<!--[if IE 7]>
      	<link href="css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
		<title>Tema </title>
		<meta charset="utf-8"/>
		
		
		<script type="text/javascript" src="<?= base_url().'../../js/jquery-1.4.2.min.js'?>"></script>
		<script type="text/javascript" src="<?= base_url().'../../js/jquery.validate.min.js'?>"></script>
		<script type="text/javascript" src="<?= base_url().'../../js/jquery-ui-1.8.2.custom.min.js'?>"></script>
		
		<script type="text/javascript">
		  	$(document).ready(function(){
		  	
				$("#form_comentario").validate(
					{
						rules: {
							nombre: "required",
							email: {
								required: true,
								email: true
							},
							comentario:	"required"
						},
						messages: {
							nombre: "El campo Nombre no puede ir vacio",
							email: {
								email: "Por favor ingrese un formato valido de email",
								required: "Debe suministrar su correo electronico"
							},
							comentario: "El comentario no puede ir vacio"
						}
					}
				);
		  	});
		</script>
		
	</head>
	
	<body >
		
		<div class = "cabecera">
			<a href="<?= base_url().'../../index.html'?>"><img src="<?= base_url().'../../img/PerfectCircle.jpg'?>" alt="logoAPC"/> </a>
			<h1>A PERFECT CIRCLE</h1>
			<h2>Fan Page</h2>
			<h3>Bienvenido, esperamos que esta página sea de su agrado.</h3>
		</div>
		
		<br/>
		<br/>
		
		
		<div class="libro_class"> 
			<ul id = "menu_principal"> 
				<li> <a class="menu_anchor1" href="<?= base_url().'../../index.html'?>"> Home </a> </li>
				<li> <a class="menu_anchor1" href="<?= base_url().'../../biografia.html'?>"> Biografía </a> </li>
				<li> <a class="menu_anchor1" href="<?= base_url().'../../discografia.html'?>"> Discografía </a> </li>
				<li> <a class="menu_anchor1" href="<?= base_url().'../../media.html'?>"> Media </a> </li>
				<li id = "menu_principal2"> <a class="menu_anchor2" href="<?= base_url().'../../proximos_conciertos.html'?>"> Próximos Conciertos </a> </li>
				<li> <a class="menu_anchor2" href="<?= base_url().'../../libro_de_visitas.php'?>"> Libro de Visitas </a> </li>
				<li id = "menu_principal2"> <a class="menu_anchor2" href="<?= base_url().'../../compra_de_entradas.php'?>"> Compra de Entradas </a> </li>
				<li> <a class="menu_anchor1" href="<?= base_url().'../../foro/CodeIgniter_2.1.2/index.php'?>"> Foro </a> </li>
			</ul>
		</div>
		
		<div class="libro_class"> 
			<br/>
			<br/>
			
			<?php if ($result == NULL) { ?>
				 <h2> <?php echo 'Hubo un problema cargando el tema elegido' ?></h2>
			<?php } else { ?>
				
				<table>

				    <tbody>
						<?php foreach ($result as $row) {?>
							<tr>
						    	<td><h3 id="header_tema">Nombre</h3></td>
						    </tr>
						    <tr>
						        <td id="tema"><?=$row->nombre?></td>
						    </tr>
						    <tr>
						        <td><h3 id="header_tema">Email</h3></td>
						    </tr>
						    <tr>
						        <td id="tema"><?=$row->email?></td>
						    </tr>
						    <tr>
						        <td><h3 id="header_tema">Titulo</h3></td>
						    </tr>
						    <tr>
						        <td id="tema"><?=$row->titulo?></td>
						    </tr>
						    <tr>
						        <td><h3 id="header_tema">Tema</h3></td>
						    </tr>
						    <tr>    
						        <td id="tema"><?=$row->tema?></td>
						    </tr>
						<?php } ?>
				    </tbody>
			    </table>
			<?php } ?>
			
			<?php if ($result2 == NULL) { ?>
				 <h2> <?php echo 'Aún no se ha comentado sobre este tema' ?></h2>
			<?php } else { ?>
				<?php foreach ($result2 as $row) {?>
					<table id="tabla_comentario">
	
					    <tbody>
							
								<div id="contenedor_comment">
									<tr>
								    	<td><h3 id="header_tema">Nombre</h3></td>
								        <td id="tema"><?=$row->nombre?></td>
								    
								        <td><h3 id="header_tema">Email</h3></td>
								        <td id="tema"><?=$row->email?></td>
								    </tr>
								    <tr>
								    	<td><h3 id="header_tema">Emisión:</h3></td>
								        <td colspan ="3" id="tema"><?=$row->fecha_hora?></td>
								        
								    </tr>
								    <tr>
								    	<td colspan="4"><h3 id="header_comentario">Comentario</h3></td>
								    </tr>
								    <tr>
								        <td colspan = "4" id="tema"><?=$row->comentario?></td>
								    </tr>
								    <br/>
								</div>
							
					    </tbody>
				    </table>
				<?php } ?>
			<?php } ?>
			
			
			
			<!-- "<?=site_url('welcome/ver_tema/'.$row->id)?>"><?=$row->titulo?> -->
			
			<form id ="form_comentario" method="post" action="<?=site_url('welcome/agregar_comentario/'.$id)?>"> 
				
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
					<label for="comentario">Comentario</label>
					<br/>
					<textarea id="textarea_comentario_foro" name="comentario" id="comentario" class="required"></textarea>
				</p>
				
				<p>
					<input id="boton_submit_comentario" type="submit" value="Enviar" />
				</p>
				
			</form>
			
			<p>
				<h3 id="regresar_al_foro"><a href="<?=site_url('welcome/index')?>">Volver al foro</a></h3>
			</p>
			
			
		</div>
		
		<div class="pie">
			<footer>
				<ul id = "menu_footer"> 
					<li> <a href="<?= base_url().'../../index.html'?>"> Home </a> </li>
					<li> <a href="<?= base_url().'../../biografia.html'?>"> Biografía </a> </li>
					<li> <a href="<?= base_url().'../../discografia.html'?>"> Discografía </a> </li>
					<li> <a href="<?= base_url().'../../media.html'?>"> Media </a> </li>
					<li> <a href="<?= base_url().'../../proximos_conciertos.html'?>"> Próximos Conciertos </a> </li>
					<li> <a href="<?= base_url().'../../libro_de_visitas.php'?>"> Libro de Visitas </a> </li>
					<li> <a href="<?= base_url().'../../compra_de_entradas.php'?>"> Compra de Entradas </a> </li>
					<li> <a href="<?= base_url().'../../foro/CodeIgniter_2.1.2/index.php'?>"> Foro </a> </li>
				</ul>
			</footer>
		</div>
		
		
	</body>
</html>