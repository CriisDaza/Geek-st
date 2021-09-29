<?php
include "presentacion/menuCliente.php";

if(isset($_POST["buy"]) ){
    
    $fact = new Factura("",$_POST["valor"],$_SESSION["id"]);
    $idfact=$fact -> CrearFactura();
    
    $carrito=new Carrito($_SESSION["carrito"],"","");
    $productosCarrito = $carrito -> ConsultarProductos();
    
    $factura = new Factura($idfact);
    $res=$factura -> Consultar();
    
    ?>
   <div class="container">
   <div class="row mt-3">
			<div class="col-3 col-sm-2  col-lg-2 text-end">
				<img src="img/logo.png" width="50%">
			</div>
			<div class="col-6 col-sm-8  col-lg-8">
				<h1 class="text-center">FACTURA <?php echo " ".$idfact ?> </h1>
			</div>
		</div>
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row mt-3"><h4>
		  <?php echo "FECHA: ".$res[0]?>
		</h4></div>
		
		<div class="row mt-3"><h4>
		  <?php echo "HORA: ".$res[1]?>
		</h4></div>
		
		<div class="row mt-3"><h4>
		  <?php echo "CLIENTE: ".$res[3]."  ".$res[4]?>
		</h4></div>
		
		<br>
		<br>
		<br>
		<br>
        <table class="table">
        <tbody>
        <tr>
        <th width="40%" class="text-center">Descripcion</th>
        <th width="15%" class="text-center">Cantidad</th>
        <th width="20%" class="text-center">Precio</th>
        <th width="20%" class="text-center">Subtotal</th>
       
   <?php 
        
        foreach ($productosCarrito as $productoActual){ ?>
            
            <tr>
            <td width="40%" class="text-center"><?php echo $productoActual -> getNombre()?></td>
            <td class="text-center"><?php echo $productoActual -> getCantidad()?> </td>
            <td width="20%" class="text-center"><?php echo $productoActual -> getPrecio()?></td>
            <?php $subtotal=($productoActual -> getPrecio()) * ($productoActual -> getCantidad())?>
            <td width="20%" class="text-center"><?php echo number_format($subtotal,2) ?></td>
            
            <?php $pfact= new PFactura($idfact,$productoActual -> getId(),$productoActual -> getCantidad(),$subtotal);
                  $pfact -> AgregaraFactura();
                  $pfact ->Descontar();
                  
          }
       ?>
        </tr>
			
			
			<tr>
				<td colspan="3" align="right"><h4>Total</h4></td>
				<td align="right"><h4>$<?php echo number_format($res[2],2)?></h4>
				
				<td>
			
			</tr>
			<tr>
			<td colspan="4" align="right">	<a class="btn btn-primary" href="index.php?pid=<?php echo  base64_encode("presentacion/sesionCliente.php")?>" role="button">Continuar</a></td>
			</tr>
			</tbody>
			</table>
			</div>
			
<?php 
        
        
        
        $carr= new Carrito($_SESSION["carrito"],"","");
        $carr ->CambiarEstado();
        
        $carrito = new Carrito("","",$_SESSION["id"]);
        $_SESSION["carrito"]=$carrito ->Crear();
        
        $carr= new Carrito($_SESSION["carrito"],"","");
        
        if($carr ->CantidadCarrito()!= NULL){
            
            $_SESSION["car"]=$carr ->CantidadCarrito();
        }else{
            
            $_SESSION["car"]=0;
        }
}
?> 