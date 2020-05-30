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
                  public function __construct() {
                  }

                  public function Comprobarmonitor($IdMonitor){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('SELECT IdMonitor FROM ' . self::TABLA . ' WHERE IdMonitor = :IdMonitor');
                     $consulta->bindParam(':IdMonitor', $IdMonitor);
                     $consulta->execute();
                     $registro = $consulta->fetch();
                     if($registro){
                        return true;
                     }else{
                        return false;
                     }
                     $conexion = null;
                  }

                  public function  guardarmonitor($IdMonitor, $Nombre, $Apellido, $Dni, $Profesion){
                     $conexion = new Conexion();
                     
                        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (IdMonitor, Nombre, Apellido, Dni, Profesion) VALUES(:IdMonitor, :Nombre, :Apellido, :Dni, :Profesion)');
                        $consulta->bindParam(':IdMonitor', $IdMonitor);
                        $consulta->bindParam(':Nombre', $Nombre);
                        $consulta->bindParam(':Apellido', $Apellido);
                        $consulta->bindParam(':Dni', $Dni);
                        $consulta->bindParam(':Profesion', $Profesion);
                        $consulta->execute();
                        
                     
                     $conexion = null;
                  }

                  public function buscarNombre($parametro){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE Nombre LIKE '%".$parametro."%' ");
                     $consulta->execute();
                     $consulta->setFetchMode('Monitor');
                     return $obj = $consulta->fetchAll();
                    /* $obj = $consulta->fetchAll();
                     foreach ($obj as $f) {
                         echo $f->titulo."\n";
                     }*/
                     $conexion = null;
                  }

                  public function BorrarPorId($IdMonitor){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE IdMonitor = :IdMonitor');
                     $consulta->bindParam(':IdMonitor',$IdMonitor);
                     $consulta->execute();
                     $conexion = null;
                  }
                  
                  public function ActualizarMonitor($IdMonitor, $Nombre, $Apellido, $Dni, $Profesion){
                     $conexion = new Conexion();
                     if($IdMonitor){
                        $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET Nombre = :Nombre, Apellidos = :Apellidos, Dni = :Dni, Profesion = :Profesion, WHERE IdMonitor = :IdMonitor');
                        $consulta->bindParam(':IdMonitor', $IdMonitor);
                        $consulta->bindParam(':Nombre', $Nombre);
                        $consulta->bindParam(':Apellido', $Apellido);
                        $consulta->bindParam(':Dni', $Dni);
                        $consulta->bindParam(':Profesion', $Profesion);
                           $consulta->execute();
                        $conexion = null;
                     }}

                }
               ?>   
