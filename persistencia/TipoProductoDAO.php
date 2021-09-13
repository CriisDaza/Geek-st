<?php
class TipoProductoDAO
{
  private $idtipoproducto;
  private $nombre;
  
  public function TipoProductoDAO($id="",$nombre=""){
      $this ->idtipoproducto =$id ;
      $this -> nombre =$nombre;
  }
  public function Consultar(){
      return "select nombre from tipoproducto where idtipoproducto= ".$this -> idtipoproducto;
  }
  
  public function ConsultarTodos(){
      
      return "select idtipoproducto, nombre from tipoproducto order by nombre desc";
  }
}

