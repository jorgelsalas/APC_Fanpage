function validarConAlerts(){
  //Limpiar el span de error
  document.getElementById("nombre_error").innerHTML = "";
  document.getElementById("email_error").innerHTML = "";
  document.getElementById("texto_error").innerHTML = "";

  if(validarNombre())
    if(validarEmail())
      if(validarTexto())
        return true;

  return false;
}
      
function validarNombre(){
  var elem = document.getElementById('nombre');
  var espacios = /^\s*$/;
  if( (elem.value.length == 0) || (elem.value.match(espacios)) ){
    document.getElementById("nombre_error").innerHTML = "Nombre no puede ir vacio!";
    elem.focus(); 
    return false;
  }
  return true;
}

function validarTexto(){
	var tags = /(<([^>]+)>)/ig;
    
    var espacios = /^\s*|\s*$/;
    
    var nbspIni = /^(&nbsp;|\s)*/;
    var nbspFin = /(&nbsp;|\s)*$/;
    
    var elem = nicEditors.findEditor('mensaje').getContent();
    //alert(elem);
    
    elem = elem.replace(tags,"");
    
    //alert(elem);
    
    elem = elem.replace(nbspIni,"");
    
    //alert(elem);
    
    elem = elem.replace(nbspFin,"");
    
    //alert(elem);
    
	
	//alert(elem.length);
	//alert(elem.length == 0);
	//if((elem == "") || (elem.match(espacios))){
	if(elem.length == 0 ){
	//if( ( elem.length == 0 ) || ( elem.match(espacios) ) ){
  		document.getElementById("texto_error").innerHTML = "El contenido del mensaje no puede ir vacio!";
    	//alert("entro");
    	//alert(elem);
    	return false;
  	}
  	//alert("paso recto");
  	return true;
}

function validarEmail(){
  var elem = document.getElementById('email');
  var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
  if(elem.value.match(emailExp)){
    return true;
  }
  else{
	document.getElementById("email_error").innerHTML = "Email Incorrecto!";
    elem.focus();
    return false;
  }
}
