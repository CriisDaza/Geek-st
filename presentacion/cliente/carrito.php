<?php
include "presentacion/menuCliente.php";

$carrito=new Carrito($_SESSION["carrito"],"","");
$productosCarrito = $carrito -> ConsultarProductos();
$p=count($productosCarrito);


for($i=0;$i<$p;$i++){
    
if(isset($_POST["bot".$i])){
   $idp= $productosCarrito[$i] -> getid();
   $pcarrito= new PCarrito($_SESSION["carrito"],$idp,$_POST["cant".$i]);
   $pcarrito -> CambiarCantidad();
   $productosCarrito = $carrito -> ConsultarProductos();
  
}
if(isset($_POST["elim".$i])){
    $idp= $productosCarrito[$i] -> getid();
    $pcarrito= new PCarrito($_SESSION["carrito"],$idp,"");
    $pcarrito -> BorrardelCarrito();
    $productosCarrito = $carrito -> ConsultarProductos();
}
}
?>
<div class="container" >
<br>
<h3>Lista del hpta carrito</h3>

<?php if(($_SESSION['car'])!=0){?>

<table class="table">
<tbody>
<tr>
<th width="40%" class="text-center">Descripcion</th>
<th width="15%" class="text-center">Cantidad</th>
<th width="20%" class="text-center">Precio</th>
<th width="20%" class="text-center">Total</th>
<th width="5%" class="text-center">--</th>

</tr>
<?php $total=0;


$pos=0;

foreach ($productosCarrito as $productoActual){   $pos++;?>
  
<tr>
<td width="40%" class="text-center"><?php echo $productoActual -> getNombre()?></td>
<td class="text-center">
 <form action="index.php?pid=<?php echo  base64_encode("presentacion/cliente/carrito.php")?>" method="post">
	<div class=row>
	<div class="mb-3 col-6">
		<select class="form-select" name=<?php echo "'cant" .($pos-1). "'" ?>>
		
			<option value="1" <?php if($productoActual -> getCantidad() == 1) echo "selected"?>>1</option>
			<option value="2" <?php if($productoActual -> getCantidad() == 2) echo "selected"?>>2</option>
			<option value="3" <?php if($productoActual -> getCantidad() == 3) echo "selected"?>>3</option>
			<option value="4" <?php if($productoActual -> getCantidad() == 4) echo "selected"?>>4</option>
			<option value="5" <?php if($productoActual -> getCantidad() == 5) echo "selected"?>>5</option>

		</select>
		<button class="btn btn-primary" type="submit" name=<?php echo "'bot" .($pos-1). "'" ?>>Cambiar</button>
		</div>
		</div>
		 </form>
     </td>

<td width="20%" class="text-center"><?php echo $productoActual -> getPrecio()?></td>
<td width="20%" class="text-center"><?php echo number_format( ($productoActual -> getPrecio()) * ($productoActual -> getCantidad()) ,2) ?></td>
<td width="5%"> <form action="index.php?pid=<?php echo  base64_encode("presentacion/cliente/carrito.php")?>" method="post">
<button class="btn btn-primary" name=<?php echo "'elim" .($pos-1). "'" ?> type="submit">Eliminar</button>
 
 </form></td>

</tr>
<?php $total=$total+(($productoActual -> getPrecio()) * ($productoActual -> getCantidad()))?>
<?php }?>
<tr>
<td colspan="4" align="right"><h3>Total</h3></td>
<td align="right"><h3>$<?php echo number_format($total,2)?></h3></td>
</tr>
<tr>
<td colspan="6" align="right"><form action="index.php?pid=<?php echo  base64_encode("presentacion/cliente/comprar.php")?>" method="post">
<button class="btn btn-primary" name="buy" type="submit">Comprar</button>
 
 </form></td></tr>
 
</tbody>
</table>
<?php }else{?>
<div class="alert alert-success">
No hay productos en el hpta carrito...
</div>

<?php }?>
</div>


