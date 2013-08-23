<!DOCTYPE html>
<html>
	<head>
		<!--[if IE]>
      	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Aguafina+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="<?= base_url().'../../css/estilo_libro_de_visitas.css'?>" rel="stylesheet" type="text/css" />
		
		<!--[if IE 7]>
      	<link href="css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
		<title>Foro </title>
		<meta charset="utf-8"/>
		
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>
		
		<script type="text/javascript" src="<?= base_url().'../../js/jquery-1.4.2.min.js'?>"></script>
		<!--<script src="js/libs/jquery-1.6.2.min.js"></script>-->
		<script type="text/javascript" src="<?= base_url().'../../js/jquery.validate.min.js'?>"></script>
		<script type="text/javascript" src="<?= base_url().'../../js/jquery-ui-1.8.2.custom.min.js'?>"></script>
		
		<script type="text/javascript">
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
							tema: "required"
						},
						messages: {
							nombre: "El campo Nombre no puede ir vacio",
							email: {
								email: "Por favor ingrese un formato valido de email",
								required: "Debe suministrar su correo electronico"
							},
							titulo: "El titulo no puede ir vacio",
							tema: "El tema no puede ir vacio"
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
				 <h2> <?php echo 'Actualmente no existen temas en el foro' ?></h2>
			<?php } else { ?>
				
				<table >
					<thead>
				    	<tr>
				        	
				        	<th><h3>Título del tema</h3></th>				        	
				        </tr>
				    </thead>
				    <tbody>
						<?php foreach ($result as $row) {?>
							<tr>
						    	
						        
						        <td id="tema"><a href="<?=site_url('welcome/ver_tema/'.$row->id)?>"><?=$row->titulo?></a></td>
						        
						    
						    </tr>
						<?php } ?>
				    </tbody>
			    </table>
			<?php } ?>
			
			
			
			<form class="form" name="form_visitas" method="post" action="<?=site_url('welcome/agregar_tema')?>"> 
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
					
					<!--Tema: -->
					<label for="tema">Tema</label> 
					<br/>
					<br/>
					<span class="form_error" id="texto_error"></span>
					<textarea name="tema" id="tema" class="required"></textarea>
					
					
				</div>
				
				<p>
					<input type="submit" value="Enviar" />
				</p>
				
			</form>
			
			
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