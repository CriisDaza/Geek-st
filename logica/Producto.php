<?php
require_once 'persistencia/Conec.php';
require_once 'persistencia/ProductoDAO.php';

class Producto
{
        private $id;
        private $nombre;
        private $precio;
        private $cantidad;
        private $imagen;
        private $prov;
        private $marca;
        private $tipoproducto;
        private $conexion;
        private $productoDAO;
        
        public function getId()
        {
            return $this->id;
        }
    
        public function getNombre()
        {
            return $this->nombre;
        }
    
        public function getPrecio()
        {
            return $this->precio;
        }
    
        public function getCantidad()
        {
            return $this->cantidad;
        }
    
        public function getImagen()
        {
            return $this->imagen;
        }
    
        public function getProv()
        {
            return $this->prov;
        }
    
        public function getMarca()
        {
            return $this->marca;
        }
    
        public function getTipoproducto()
        {
            return $this->tipoproducto;
        }
    
        public function Producto($id = "", $nombre = "", $precio = "", $cantidad = "", $imagen = "", $provee = "", $marca = "", $tipoProducto = ""){
    
            $this -> id= $id;
            $this -> nombre = $nombre;
            $this -> precio = $precio;
            $this -> cantidad = $cantidad;
            $this -> imagen = $imagen;
            $this -> prov = $provee;
            $this -> marca = $marca;
            $this -> tipoproducto = $tipoProducto;
            $this -> conexion = new Conec();
            $this -> productoDAO = new ProductoDAO($id, $nombre, $precio, $cantidad, $imagen, $provee, $marca, $tipoProducto );
        }
        
        public function Crear()  {
            
           $this -> conexion -> Abrir();
           $this -> conexion -> ejecutar($this -> productoDAO -> Crear());
           $this -> conexion -> cerrar();
        }
        
        public function Consultar(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> Consultar());
            $resultado = $this -> conexion -> extraer();
            
            $proveedor = new Proveedor($resultado[5]);
            $proveedor -> Consultar();
            
            $marca = new Marca($resultado[6]);
            $marca -> Consultar();
            
            $tipoproducto = new TipoProducto($resultado[7]);
            $tipoproducto -> Consultar();
            
            $this -> nombre = $resultado[1];
            $this -> precio = $resultado[2];
            $this -> cantidad = $resultado[3];
            $this -> imagen = $resultado[4];
            $this -> prov = $proveedor;
            $this -> marca = $marca;
            $this -> tipoproducto = $tipoproducto;
        }
        
        
        public function ConsultarTodos($atributo, $direccion, $filas , $pag){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> ConsultarTodos($atributo, $direccion, $filas, $pag));
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
        
        public function ConsultarTotalFilas(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> ConsultarTotalFilas());
            
            return $this -> conexion -> extraer()[0];
        }
        
        public function ConsultarFiltro($filtro){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> ConsultarFiltro($filtro));
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
        
        public function EditarImagen(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> EditarImagen());
            $this -> conexion -> cerrar();
        }
        
        public function Agregar() {
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> productoDAO -> Agregar());
            $this -> conexion -> cerrar();
            
        }
    }
    
    
    


