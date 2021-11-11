<?php

namespace App\Controllers;

//importo el modelo
use App\Models\AnimalModelo;

class Animales extends BaseController{
    
    public function index(){
        return view('registroAnimales');
    }

    public function registrar(){
       
        //se reciben los datos del formulario
        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");
        $foto=$this->request->getPost("foto");
        $descripcion=$this->request->getPost("descripcion");
        $tipoAnimal=$this->request->getPost("tipoAnimal");
        $id_producto=$this->request->getPost("id_producto");

        //aplico las validaciones
        if($this->validate('formularioAnimales')){

           try{

            //creo un objeto del modelo de animales
            $modelo=new AnimalModelo();

             //se crea un arreglo con los datos recibidos
            $datos=array(
                "nombre"=>$nombre,
                "edad"=>$edad,
                "foto"=>$foto,
                "descripcion"=>$descripcion,
                "tipo"=>$tipoAnimal,
                "id_producto"=>$id_producto
            );

            $modelo->insert($datos);

            $mensaje="exito agregando el animal...";
            return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
               
           }

        }else{
            $mensaje="Revise por favor hay datos obligatorios";
    
            return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);

        
        }
    }

    public function buscar(){

        try{

            //creo un objeto del modelo de animales
            $modelo=new AnimalModelo();

            $resultado=$modelo->findAll();

            $animales=array("animales"=>$resultado);

            return view('listaAnimales',$animales);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
               
           }

    }

    public function eliminar($id){

        try{
         $modelo=new AnimalModelo();
         $modelo->where('id',$id)->delete();
         $mensaje="exito eliminando el producto...";
         return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
 
 
        }catch(\Exception $error){
 
         $mensaje=$error->getMessage();
         return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
         
         }
 
     }

     public function editar($id){

        //Recibo datos a editar
        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");

        //aplico las validaciones
        if($this->validate('formularioEdicionAnimales')){

            try{
 
             //creo un objeto del modelo de animales
             $modelo=new AnimalModelo();
 
              //se crea un arreglo con los datos recibidos
             $datos=array(
                "nombre"=>$nombre,
                "edad"=>$edad,
                "descripcion"=>$descripcion,
                "tipo"=>$tipo, 
             );
 
             
             $modelo->update($id,$datos);
 
             $mensaje="exito editando el producto...";
             return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
 
 
            }catch(\Exception $error){
 
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
                
            }
 
         }else{
             $mensaje="Revise por favor hay datos obligatorios";
     
             return redirect()->to(site_url('/animal/buscar'))->with('mensaje',$mensaje);
 
         }


    }

}