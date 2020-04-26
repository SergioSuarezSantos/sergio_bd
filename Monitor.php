        <?php
        require_once 'Conexion.php';
            class Monitor {   
                    private $IdMonitor;
                    private $Nombre;
                    private $Dni;
                    private $Profesion;
                    private $Alumno;
                  const TABLA = 'Monitor';
                  public function getId() {
                     return $this->IdMonitor;
                  }
                  public function getNombre() {
                     return $this->Nombre;
                  }
                  public function getDni() {
                     return $this->Dni;
                  }
                  public function getProfesion() {
                    return $this->Profesion;
                 }
                 public function getAlumno() {
                    return $this->Alumno;
                 }
                 public function setIdMonitor($IdMonitor) {
                    $this->IdMonitor = $IdMonitor;
                 }
                 public function setNombre($Nombre) {
                    $this->Nombre = $Nombre;
                 }
                 public function setDni($Dni) {
                    $this->Dni = $Dni;
                 }
                  public function setProfesion($Profesion) {
                     $this->Profesion = $Profesion;
                  }
                  public function setAlumno($Alumno) {
                    $this->Alumno = $Alumno;
                 }
                  public function __construct($IdMonitor=null, $Nombre, $Dni, $Profesion, $Alumno ) {
                     $this->IdMonitor = $IdMonitor;
                     $this->Nombre = $Nombre;
                     $this->Dni = $Dni;
                     $this->Profesion = $Profesion;
                     $this->Alumno = $Alumno;
                  }
                }
               ?>   
