<?php 
class FormularioController extends BaseController {
 
    /**
     * Mustra la lista con todos los usuarios
     */
    public function mostrarFormulario()
    {

  

        //$usuarios = Usuario::all();  //MODELO
        // $usuarios->setConnection('mysql2');
        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('Formulario.mostrar'); 
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }


    public function guardar(){

        return "asd";

    }
 
}
?>
