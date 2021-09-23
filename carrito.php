<?php

if(isset($_POST['btnAccion'])){
    switch ($_POST['btnAccion']){
        
        
        
        
        case 'Agregar':
           if(isset($_POST['idproducto']))
               $id=$_POST['idproducto'];
               $producto = new Producto($id);
               $producto->Consultar();
               
               
               if(!isset($_SESSION['carrito'])){
                 $producto2=  array(
                   'id'=>$producto->getId(),
                   'nombre'=>$producto->getNombre(),
                   'precio'=>$producto->getPrecio(),
                   'cantidad'=>$producto->getCantidad(),
                   'imagen'=>$producto->getImagen(),
                   'marca'=>$producto->getMarca()->getNombre(),
                   'tipoproducto'=>$producto->getTipoproducto()->getNombre()
                 );
                 $_SESSION['carrito'][0]=$producto2;
               }else{
                   $numProd=count( $_SESSION['carrito']);
                   $producto2=  array(
                       'id'=>$producto->getId(),
                       'nombre'=>$producto->getNombre(),
                       'precio'=>$producto->getPrecio(),
                       'cantidad'=>$producto->getCantidad(),
                       'imagen'=>$producto->getImagen(),
                       'marca'=>$producto->getMarca()->getNombre(),
                       'tipoproducto'=>$producto->getTipoproducto()->getNombre()
                   );
                   $_SESSION['carrito'][$numProd]=$producto2;
               }
              // echo "<h1>carrito: </td><td>" .print_r($_SESSION,true). "</h1>";
               break;
    }
}