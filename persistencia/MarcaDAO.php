<?php
class MarcaDAO
{
        private $idmarca;
        private $nombre;
        
        public function MarcaDAO($idmarca="",$nombre=""){
            
            $this -> idmarca = $idmarca;
            $this -> nombre = $nombre;
        }
        
        public function Consultar(){
            
          return "select nombre from marca where idmarca =". $this-> idmarca; 
        }
        
        public function ConsultarTodos(){
            
           return "select idmarca, nombre from marca order by nombre desc";
        }
        
    }
    
    


