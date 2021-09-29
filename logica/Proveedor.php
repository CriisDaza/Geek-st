<?php
require_once 'persistencia/ProveedorDAO.php';
require_once "persistencia/Conec.php";

class Proveedor
{
        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $clave;
        private $admin;
        private $estado;
        private $conexion;
        private $proveedorDAO;
        
        public function getId()
        {
            return $this->id;
        }
        
        public function getNombre()
        {
            return $this->nombre;
        }
        
        public function getApellido()
        {
            return $this->apellido;
        }
        
        public function getCorreo()
        {
            return $this->correo;
        }
        
        public function getClave()
        {
            return $this->clave;
        }
        
        public function getAdmin()
        {
            return $this->admin;
        }
        public function getEstado()
        {
            return $this->estado;
        }
        
        public function getConexion()
        {
            return $this->conexion;
        }
        
        public function getProveedorDAO()
        {
            return $this->proveedorDAO;
        }
        
        public function Proveedor($id=0, $nom="", $ape="", $mail="", $clav="",  $estado="",$admin=""){
            
            $this -> id = $id;
            $this -> nombre = $nom;
            $this -> apellido = $ape;
            $this -> correo = $mail;
            $this -> clave = $clav;
            $this -> estado = $estado;
            $this -> admin = $admin;
            $this -> conexion = new Conec();
            $this -> proveedorDAO = new ProveedorDAO($id, $nom, $ape, $mail, $clav,$estado, $admin );
        }
        
        public function Crear(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> Crear());
            $this -> conexion -> cerrar();
        }
        
        public function Autenticar(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> Autenticar());
            if($this -> conexion -> numFilas() == 0){
                
                return false;
            }else{
                
                $resultado = $this -> conexion -> extraer();
                $this -> id = $resultado[0];
                $this -> estado = $resultado[1];
                
                return true;
            }
        }
        
        public function Activar(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> Activar());
            $this -> conexion -> cerrar();
        }
        
        public function Deshabilitar(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> Deshabilitar());
            $this -> conexion -> cerrar();
        }
        
        public function ConsultarEstado(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> ConsultarEstado());
            $resultado = $this -> conexion -> extraer();
            $this -> estado = $resultado[0];
        }
        
        public function Consultar() {
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> Consultar());
            $resultado = $this -> conexion -> extraer();
            $this -> nombre = $resultado[0];
            $this -> apellido = $resultado[1];
            $this -> correo = $resultado[2];
            
        }
        
        public function ConsultarporProv($atributo, $direccion, $filas , $pag){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> ConsultarporProv($atributo, $direccion, $filas, $pag));
            $productos = array();
            
            while(($resultado = $this -> conexion -> extraer()) != null){
                
                $proveedor = new Proveedor($resultado[5]);
                $proveedor -> Consultar();
                
                $marca = new Marca($resultado[6]);
                $marca -> Consultar();
                
                $tipoproducto = new TipoProducto($resultado[7]);
                $tipoproducto -> Consultar();
                
                array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $proveedor, $marca, $tipoproducto));
            }
            
            $this -> conexion -> cerrar();
            
            return $productos;
        }
        
        public function ConsultarTotalFilasporProv(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> proveedorDAO -> ConsultarTotalFilasporProv());
            
            return $this -> conexion -> extraer()[0];
        }
   }

