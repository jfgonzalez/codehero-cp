<script>
jQuery(document).ready(function(){  

  

	$("input[validar_text]").each(function(cant){
		
		$(this).on("keydown",function( event ){
			var tecla = event.which;		   
			return !( (tecla > 47 && tecla < 58) || (tecla > 95 && tecla < 106) || tecla == 46 );
		});
	
	});

    $("input[validar]").each(function(cant)
    {
       $(this).keypress(function(event)
       {
               var tecla = (document.all) ? event.keyCode : event.which;
               if (tecla==8) return true;
               if (tecla==0) return true;
               var te = String.fromCharCode(tecla);
               var patron = $(this).attr('validar');
               var valor  = $(this).val()+te;           
               var cant=0;
               var dec=0;
               
               for (var i=0; i < patron.length; i++)
               { 
                          
                       if(patron.charAt(i)==te)
                       {                                                                                                         
                        var estado=true;                                                              
                       }
               }
              
               if(valor.length>30){
                estado=false;  
               }
                
              
               if(estado==true)
               {
                          return true;                   
               }
               else
               {
                       return false;
               }
       });               
 }); 

    $.validator.addMethod("rut", function(value, element) {								  
      return this.optional(element) || $.Rut.validar(value); 
    }, "Este campo debe ser un rut valido.");
	
	jQuery('#rut').Rut({
      on_error: function(){   },
      on_success: function(){   },
      format_on: 'keyup'
    }); 

	jQuery.validator.addMethod("valida_txt", function(value, element) {														
				if (value=="11.111.111-1"){  
				return false;
				} else {
				return true;
				} 
	});

	
    jQuery("#frm").validate({
        rules:{ 
          'nombre'            : { required:true, minlength:3, maxlength:40},  
		  'ap_paterno'        : { required:true, minlength:3, maxlength:40}, 
		  'ap_materno'        : { required:true, minlength:3, maxlength:40}, 		  
		  'rut'               : { required:true, rut:"rut"},  		  
		  'email'             : { required:true, email:true },
		  'telefono'          : { required:true, number:true},
		  'renta'             : { required:true}
		
        },
        errorPlacement: function(error, element){     		 	
			element.addClass('error');	//ocupacion										
        },
       unhighlight: function(element){	
			jQuery(element).removeClass('error');			 																									
        },  
        submitHandler:function(){  		 	
		_gaq.push(['_trackEvent','cambiate','enviar formulario']);
				$("#loaderImage").show();
				$("#btn_envia").hide();

				$.post("formulario/ajax/setRegistro", jQuery("#frm").serialize()+"<?php echo $param; ?>",
		            function(data){
				
						//-1 no envia todos los datos
						if(data==1){
						$("#formulario").hide();
						$("#gracias").show();	
						}

						//$("#formulario").html(data);

						$("#loaderImage").hide();
						$("#btn_envia").show();
						
					
						
						
						//alert(data);          
		            
		        }); 


        }
    });
	
	
	

});




</script>
<script type="text/javascript">
	var cSpeed=9;
	var cWidth=40;
	var cHeight=40;
	var cTotalFrames=23;
	var cFrameWidth=40;
	var cImageSrc='images/sprites.png';
	
	var cImageTimeout=false;
	var cIndex=0;
	var cXpos=0;
	var cPreloaderTimeout=false;
	var SECONDS_BETWEEN_FRAMES=0;
	
	function startAnimation(){
		
		document.getElementById('loaderImage').style.backgroundImage='url('+cImageSrc+')';
		document.getElementById('loaderImage').style.width=cWidth+'px';
		document.getElementById('loaderImage').style.height=cHeight+'px';
		
		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(100/cSpeed);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;
		
		cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);
		
	}
	
	function continueAnimation(){
		
		cXpos += cFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		cIndex += 1;
		 
		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (cIndex >= cTotalFrames) {
			cXpos =0;
			cIndex=0;
		}
		
		if(document.getElementById('loaderImage'))
			document.getElementById('loaderImage').style.backgroundPosition=(-cXpos)+'px 0';
		
		cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);
	}
	
	function stopAnimation(){//stops animation
		clearTimeout(cPreloaderTimeout);
		cPreloaderTimeout=false;
	}
	
	function imageLoader(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(cImageTimeout);
		cImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
		genImage.onerror=new Function('alert(\'Could not load the image\')');
		genImage.src=s;
	}
	
	//The following code starts the animation
	new imageLoader(cImageSrc, 'startAnimation()');
</script>