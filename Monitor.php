        <?php
        require_once 'Conexion.php';
            class Monitor {   
                    private $IdMonitor;
                    private $Nombre;
                    private $Apellido;
                    private $Dni;
                    private $Profesion;
                  const TABLA = 'monitor';
                  public function getIdMonitor() {
                     return $this->IdMonitor;
                  }
                  public function getNombre() {
                     return $this->Nombre;
                  }
                  public function getApellido() {
                     return $this->Apellido;
                  }
                  public function getDni() {
                     return $this->Dni;
                  }
                  public function getProfesion() {
                    return $this->Profesion;
                 }
                 public function setIdMonitor($IdMonitor) {
                    $this->IdMonitor = $IdMonitor;
                 }
                 public function setNombre($Nombre) {
                    $this->Nombre = $Nombre;
                 }
                 public function setApellido($Apellido) {
                  $this->Apellido = $Apellido;
               }
                 public function setDni($Dni) {
                    $this->Dni = $Dni;
                 }
                  public function setProfesion($Profesion) {
                     $this->Profesion = $Profesion;
                  }
                  public function __construct($IdMonitor, $Nombre, $Apellido, $Dni, $Profesion) {
                     $this->IdMonitor = $IdMonitor;
                     $this->Nombre = $Nombre;
                     $this->Apellido = $Apellido;
                     $this->Dni = $Dni;
                     $this->Profesion = $Profesion;
                  }

                  public function Comprobarmonitor(){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('SELECT IdMonitor FROM ' . self::TABLA . ' WHERE IdMonitor = :IdMonitor');
                     $consulta->bindParam(':IdMonitor', $this->IdMonitor);
                     $consulta->execute();
                     $registro = $consulta->fetch();
                     if($registro){
                        return true;
                     }else{
                        return false;
                     }
                     $conexion = null;
                  }

                  public function guardarmonitor(){
                     $conexion = new Conexion();
                     
                        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (IdMonitor, Nombre, Apellido, Dni, Profesion) VALUES(:IdMonitor, :Nombre, :Apellido, :Dni, :Profesion)');
                        $consulta->bindParam(':IdMonitor', $this->IdMonitor);
                        $consulta->bindParam(':Nombre', $this->Nombre);
                        $consulta->bindParam(':Apellido', $this->Apellido);
                        $consulta->bindParam(':Dni', $this->Dni);
                        $consulta->bindParam(':Profesion', $this->Profesion);
                        $consulta->execute();
                        
                     
                     $conexion = null;
                  }

                  public static function BuscarMonitor($Nombre){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE Nombre = :Nombre');
                     $consulta->bindParam(':Nombre', $Nombre);
                     $consulta->execute();
                     $registro = $consulta->fetch();
                     if($registro){
                     return ($registro);
                     }else{
                        return false;
                     }
                     $conexion = null;
                  }

                  public function BorrarPorId(){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE IdMonitor = :IdMonitor');
                     $consulta->bindParam(':IdMonitor', $this->IdMonitor);
                     $consulta->execute();
                     $conexion = null;
                     
                  }
                  
                  public function ActualizarMonitor(){
                     $conexion = new Conexion();
                     if($this->IdMonitor){
                        $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET Nombre = :Nombre, Apellido = :Apellido, Dni = :Dni, Profesion = :Profesion WHERE IdMonitor = :IdMonitor');
                        $consulta->bindParam(':IdMonitor', $this->IdMonitor);
                        $consulta->bindParam(':Nombre', $this->Nombre);
                        $consulta->bindParam(':Apellido', $this->Apellido);
                        $consulta->bindParam(':Dni', $this->Dni);
                        $consulta->bindParam(':Profesion', $this->Profesion);
                           $consulta->execute();
                        $conexion = null;
                        
                     }}

                }
               ?>   
