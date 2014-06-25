
 {{HTML::style('css/style.css')}}
 {{ HTML::script('js/jquery/jquery.js') }}
 {{ HTML::script('js/jquery/jquery.validate.js') }}
 {{HTML::script('js/script.js')}} 



<p class="texto">Registro</p>
<div class="Registro">
<form method="post" id="frm" name="frm" action="javascript:void(0);">

<span class="fontawesome-user"></span><input id="nombre" name="nombre" type="text"  placeholder="Nombre" > 
<span class="fontawesome-envelope-alt"></span><input type="text" id="email" name="email"  placeholder="Correo" >
<span class="fontawesome-list"></span>{{ Form::selectRange('number', 10, 20)}}

<input type="submit" value="Registrar" title="Registra tu cuenta">
 
 

