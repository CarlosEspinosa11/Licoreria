<?php
    class basedatos{
        private $con;
		private $dbequipo='sql306.epizy.com';
		private $dbusuario='epiz_31575949';
		private $dbclave='YsXb4IXpvS0';
		private $dbnombre='epiz_31575949_ingreso';

        //constructor
		function __construct(){
			$this->conectar();
		}//fin constructor


        //función para conectarse a la base de datos
		public function conectar(){
			$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);

			if(mysqli_connect_error()){
				die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . mysqli_connect_errno());
			}

		}//fin funcion conectar

        //función para insertar datos
        public function insertar_reservas($nombre,$celular,$correo,$presupuesto,$destino,$observaciones,$fecha){
            $sql = "INSERT INTO crud(lic_nombre,lic_celular,lic_correo,lic_precio,lic_producto,lic_domicilio,lic_fecha) VALUES ('$nombre', '$celular', '$correo', '$presupuesto', '$destino', '$observaciones','$fecha');";
            $resultado = mysqli_query($this->con, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
        }//fin insertar_datos



        //función para consultar reservas
        public function leer_tabla(){
            $sql = "SELECT * FROM crud";
             $res = mysqli_query($this->con, $sql);
            return $res;
        }// fin consulta 



        //función que elimina reservas
        public function eliminar_reserva($id){
            $sql = "DELETE FROM crud WHERE lic_id=$id";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        //funciones para actualizar un registro,
        //se selecciona el registro basado en el ID recibido por método GET
        public function seleccionar_reserva($id){
            $sql = "SELECT * FROM crud where lic_id=$id";
            $res = mysqli_query($this->con, $sql);
            $return = mysqli_fetch_object($res);
            return $return;
        }//fin función seleccionar_reserva

            
        //Esta función actualiza el registro seleccionado
        public function actualizar_reserva($id,$nombre,$celular,$email,$observaciones,$fecha){                 
            $sql = "UPDATE crud SET lic_nombre='$nombre', lic_celular='$celular', lic_correo='$email', lic_domicilio='$observaciones', lic_fecha='$fecha' WHERE lic_id=$id ";
            //echo $sql; //activando esta línea se puede ver la impresión de la consulta SQL de la actualización.
            $res = mysqli_query($this->con, $sql);
            if($res){
                    return true;
                }else{
                    return false;
                }
            }//fin función actualizar



    }// fin clase basedatos


?>



    