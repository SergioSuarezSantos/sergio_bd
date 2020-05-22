        <?php
        require_once 'Conexion.php';
            class Alumno {   
                    private $IdAlumno;
                    private $Nombre;
                    private $Apellidos;
                    private $Telefono;
                    private $Actividad;
                    private $Categoria;
                    private $Monitor;
                  const TABLA = 'alumno';
                  public function getIdAlumno() {
                     return $this->IdAlumno;
                  }
                  public function getNombre() {
                     return $this->Nombre;
                  }
                  public function getApellidos() {
                     return $this->Apellidos;
                  }
                  public function getTelefono() {
                    return $this->Telefono;
                 }
                  public function getActividad() {
                    return $this->Actividad;
                 }
                 public function getCategoria() {
                    return $this->Categoria;
                 }
                 public function getMonitor() {
                  return $this->Monitor;
               }
                 public function setIdAlumno($IdAlumno) {
                    $this->IdAlumno = $IdAlumno;
                 }
                 public function setNombre($Nombre) {
                    $this->Nombre = $Nombre;
                 }
                 public function setApellidos($Apellidos) {
                    $this->Apellidos = $Apellidos;
                 }
                 public function setTelefono($Telefono) {
                    $this->Actividad = $Actividad;
                 }
                  public function setActividad($Actividad) {
                     $this->Telefono = $Telefono;
                  }
                  public function setCategoria($Categoría) {
                    $this->Categoría = $Categoria;
                 }
                 
                  /*public function __construct($IdAlumno, $Nombre, $Apellidos, $Telefono,  $Actividad, $Categoria, $Monitor ) {
                     $this->IdAlumno = $IdAlumno;
                     $this->Nombre = $Apellidos;
                     $this->Telefono = $Telefono;
                     $this->Actividad = $Actividad;
                     $this->Categoría = $Categoría;
                     $this->Monitor = $Monitor;
                  }*/

                  
                  public static function Comprobar($IdAlumno){
                     $conexion = new Conexion();
                     $consulta = $conexion->prepare('SELECT IdAlumno FROM ' . self::TABLA . ' WHERE IdAlumno = :IdAlumno');
                     $consulta->bindParam(':IdAlumno', $IdAlumno);
                     $consulta->execute();
                     $registro = $consulta->fetch();
                     if($registro){
                        return true;
                     }else{
                        return false;
                     }
                     $conexion = null;
                  }

                  public static function  guardar($IdAlumno, $Nombre, $Apellidos, $Telefono, $Actividad, $Categoria, $Monitor){
                     $conexion = new Conexion();
                     
                        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (IdAlumno, Nombre, Apellidos, Telefono,  Actividad, Categoria, Monitor) VALUES(:IdAlumno, :Nombre, :Apellidos, :Telefono, :Actividad, :Categoria, :Monitor)');
                        $consulta->bindParam(':IdAlumno', $IdAlumno);
                        $consulta->bindParam(':Nombre', $Nombre);
                        $consulta->bindParam(':Apellidos', $Apellidos);
                        $consulta->bindParam(':Telefono', $Telefono);
                        $consulta->bindParam(':Actividad', $Actividad);
                        $consulta->bindParam(':Categoria', $Categoria);
                        $consulta->bindParam(':Monitor', $Monitor);
                        $consulta->execute();
                        
                     
                     $conexion = null;
                  }
                  

               public static function buscarNombre($parametro){
                  $conexion = new Conexion();
                  $consulta = $conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE Nombre LIKE '%".$parametro."%' ");
                  $consulta->execute();
                  $consulta->setFetchMode(PDO::FETCH_CLASS, 'Alumno');
                  return $obj = $consulta->fetchAll();
                 /* $obj = $consulta->fetchAll();
                  foreach ($obj as $f) {
                      echo $f->titulo."\n";
                  }*/
                  $conexion = null;
               }

               

               public static function BorrarPorId($IdAlumno){
                  $conexion = new Conexion();
                  $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE IdAlumno = :IdAlumno');
                  $consulta->bindParam(':IdAlumno',$IdAlumno);
                  $consulta->execute();
                  $conexion = null;
               }
               public static function ActualizarAlumno($IdAlumno, $Nombre, $Apellidos, $Telefono, $Actividad, $Categoria, $Monitor){
                  $conexion = new Conexion();
                  if($IdAlumno){
                     $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET Nombre = :Nombre, Apellidos = :Apellidos, Telefono = :Telefono, Actividad = :Actividad, Categoria = :Categoria, Monitor = :Monitor WHERE IdAlumno = :IdAlumno');
                        $consulta->bindParam(':IdAlumno', $IdAlumno);
                        $consulta->bindParam(':Nombre', $Nombre);
                        $consulta->bindParam(':Apellidos', $Apellidos);
                        $consulta->bindParam(':Telefono', $Telefono);
                        $consulta->bindParam(':Actividad', $Actividad);
                        $consulta->bindParam(':Categoria', $Categoria);
                        $consulta->bindParam(':Monitor', $Monitor);
                        $consulta->execute();
                     $conexion = null;
                  }}
               
            }
            
               ?>   