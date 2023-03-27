<?php
include_once "../../models/blog/blog_model.php";
class BLog_controller{

    public function crear_blog($titulo , $contenido , $portada , $tipo_archivo_sel){
        $instancia = new Blog_model();
        $peticion = $instancia -> crear_blog($titulo , $contenido , $portada , $tipo_archivo_sel);

    }

    public function listar_publicaciones(){
        $instancia = new Blog_model();
        $peticion = $instancia -> listar_publicaciones(); 
        return $peticion; 
    }

    public function consultar_publicacion_editar($publicacion_id){
        $instancia = new Blog_model();
        $peticion = $instancia -> consultar_publicacion_editar($publicacion_id);
        return $peticion;
    }

    public function editar_publicacion($titulo , $contenido , $portada , $blog_id , $tipo_archivo_sel){
        $instancia = new Blog_model();
       $peticion = $instancia -> editar_publicacion($titulo , $contenido , $portada , $blog_id , $tipo_archivo_sel);
    }

    public function eliminar_publicacion($blog_id){
        $instancia = new Blog_model();
        $peticion = $instancia -> eliminar_publicacion($blog_id);   
    }
}
?>