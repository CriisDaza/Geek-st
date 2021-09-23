<?php
require_once 'carrito.php';
?>

<br>
<h3>Lista del hpta carrito</h3>

<?php if(!empty($_SESSION['carrito'])){?>
<table class="table">
<tbody>
<tr>
<th width="40%" class="text-center">Descripcion</th>
<th width="15%" class="text-center">Cantidad</th>
<th width="20%" class="text-center">Precio</th>
<th width="20%" class="text-center">Total</th>
<th width="5%" class="text-center">--</th>

</tr>
<?php $total=0;?>
<?php foreach ($_SESSION['carrito'] as $indice=>$producto){?>
<tr>
<td width="40%" class="text-center"><?php echo $producto['nombre']?></td>
<td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
<td width="20%" class="text-center"><?php echo $producto['precio']?></td>
<td width="20%" class="text-center"><?php echo number_format( $producto['precio'],2) ?></td>
<td width="5%"><button class="btn btn-primary" type="submit">Eliminar</button></td>

</tr>
<?php $total=$total+($producto['precio'])?>
<?php }?>
<tr>
<td colspan="3" align="right"><h3>Total</h3></td>
<td align="right"><h3>$<?php echo number_format($total,2)?></h3></td>
</tr>
</tbody>

</table>
<?php }else{?>
<div class="alert alert-success">
No hay productos en el hpta carrito...
</div>

<?php }?>