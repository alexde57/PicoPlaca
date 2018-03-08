function validateCampoTexto( campo ) {
	var regexp= /^[a-z]([a-z_])+$/i;
	if (campo.length > 60 || campo.length < 3 ) {
		return [false,"El campo de tener entre 3 y 60 caracteres!",""];
	}else{ 
		return [true,"",""];
	}
}

 function validatePass(campo) {  
     var RegExPattern =  /^([0-9a-zA-Z])+$/;    
     if ((campo.match(RegExPattern)) && (campo.value!='')) {  
         if ( campo.length > 11 || campo.length < 5 ) {
			return [false,"El password debe tener entre 5 y 11 caracteres!",""];
			} else{
		 		return [true,"",""];
			}
     } else {  
         return [false,"Password Incorrecto!",""];    
     }   
}  

function validateCi(campo) {
	var val = parseInt(campo);
	var RegExPattern =  /^([0-9])*$/;
	if ((campo.match(RegExPattern)) && (campo.value!='')) {  
         if ( campo.length == 10 || campo.length == 13 ) {
		 		return [true,"",""];			
			} else{
				return [false,"La CI/RUC de tener 10 números para cédula o 13 números para RUC!",""];
			}
     } else {  
         return [false,"Ingrese solo números!",""];    
     }   
}

function validateUser(campo) {  
     var RegExPattern =   /^[a-z]([0-9a-z_])+$/i;    
     if ((campo.match(RegExPattern)) && (campo.value!='')) {  
         if ( campo.length > 11 || campo.length < 6 ) {
			return [false,"El usuario debe tener entre 6 y 11 caracteres!",""];
			} else{
		 		return [true,"",""];
			}
     } else {  
         return [false,"Usuario Incorrecto!",""];    
     }   
}  


function campoRequerido(campo,nombre)
{
  if (campo.val()=='') {
	alert("Ingrese "+nombre);
		  	return false;
		} else return true;
		
}



      
   
