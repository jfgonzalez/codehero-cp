jQuery(document).ready(function(){  

	jQuery("#frm").validate({
        rules:{ 
          	'nombre'            : { required:true, minlength:3, maxlength:40},    		  
		  	'email'             : { required:true, email:true }
        },
        errorPlacement: function(error, element){     		 	
			element.addClass('error');										
        },
       unhighlight: function(element){	
			jQuery(element).removeClass('error');			 																									
        },  
        submitHandler:function(){  	



         	$.ajax({
                url: '/formulario/guardar',
                type: 'POST',
                data: jQuery("#frm").serialize(),
                success: function(respuesta) {
                   	alert(respuesta);
                }
            });



        }
             
	});
});
