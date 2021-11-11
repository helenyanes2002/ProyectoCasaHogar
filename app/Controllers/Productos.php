<?php

namespace App\Controllers;

//importo el modelo
use App\Models\ProductoModelo;

class Productos extends BaseController{
    
    public function index(){
        return view('registroProductos');
    }

    public function registrar(){
       
        //se reciben los datos del formulario
        $producto=$this->request->getPost("producto");
        $foto=$this->request->getPost("foto");
        $precio=$this->request->getPost("precio");
        $descripcion=$this->request->getPost("descripcion");
        $tipoAnimal=$this->request->getPost("tipoAnimal");

        //aplico las validaciones
        if($this->validate('formularioProductos')){

           try{

            //creo un objeto del modelo de productos
            $modelo=new ProductoModelo();

             //se crea un arreglo con los datos recibidos
            $datos=array(
                "producto"=>$producto,
                "foto"=>$foto,
                "precio"=>$precio,
                "descripcion"=>$descripcion,
                "tipo"=>$tipoAnimal
            );

            $modelo->insert($datos);

            $mensaje="exito agregando el producto...";
            return redirect()->to(site_url('/registro/productos'))->with('mensaje',$mensaje);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/registro/productos'))->with('mensaje',$mensaje);
               
           }

        }else{
            $mensaje="Revise por favor hay datos obligatorios";
    
            return redirect()->to(site_url('/registro/productos'))->with('mensaje',$mensaje);

        
        }
    }

    public function buscar(){

        try{

            //creo un objeto del modelo de productos
            $modelo=new ProductoModelo();

            $resultado=$modelo->findAll();

            $productos=array("productos"=>$resultado);

            return view('listaProductos',$productos);


           }catch(\Exception $error){

               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);
               
           }

    }

    public function eliminar($id){

       try{
        $modelo=new ProductoModelo();
        $modelo->where('id',$id)->delete();
        $mensaje="exito eliminando el producto...";
        return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);


       }catch(\Exception $error){

        $mensaje=$error->getMessage();
        return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);
        
        }

    }

    public function editar($id){

        //Recibo datos a editar
        $producto=$this->request->getPost("producto");
        $precio=$this->request->getPost("precio");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");

        //aplico las validaciones
        if($this->validate('formularioEdicion')){

            try{
 
             //creo un objeto del modelo de productos
             $modelo=new ProductoModelo();
 
              //se crea un arreglo con los datos recibidos
             $datos=array(
                "producto"=>$producto,
                "precio"=>$precio,
                "descripcion"=>$descripcion,
                "tipo"=>$tipo, 
             );
 
             
             $modelo->update($id,$datos);
 
             $mensaje="exito editando el producto...";
             return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);
 
 
            }catch(\Exception $error){
 
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);
                
            }
 
         }else{
             $mensaje="Revise por favor hay datos obligatorios";
     
             return redirect()->to(site_url('/producto/buscar'))->with('mensaje',$mensaje);
 
         }


    }

}
