<html>
    <head>
        <title>La tribu</title>
        <link rel="StyleSheet" href="./style.css" type="text/css" />
    </head>
    <?php
       require_once 'Alumno.php';
       if (isset($_POST['Enviar'])){
        Alumno::guardar($_POST['idalumno'],$_POST['nombre'],$_POST['apellido'],$_POST['contacto'],$_POST['Preferencia'],$_POST['categoria'],$_POST['monitor']);
        echo "Se agregó correctamente el/la  alumn@ " .$_POST['nombre'];
       }
       
       elseif (isset($_POST['Buscar'])){
        $resul=Alumno::buscarNombre($_POST['nombre']);
  foreach ($resul as $f) {
                    ?><tr>
                    <p><?php echo $f->getNombre()?> <?php echo $f->getApellidos()?> <?php echo $f->getTelefono()?> <?php echo $f->getActividad()?> <?php echo $f->getCategoria()?> <?php echo $f->getMonitor()?></p>
                    <tr>
                        <?php
                } ?>

           <p> <a href="./index.php">Volver </a></p>
            <?php
       }
       elseif(isset($_POST['Eliminar'])){
            Alumno::BorrarPorId($_POST['idalumno'],$_POST['nombre']);
            echo "Has eliminado el/la  alumn@ " .$_POST['nombre'];
       }
       elseif(isset($_POST['Actualizar'])){
        Alumno::ActualizarAlumno($_POST['idalumno'],$_POST['nombre'],$_POST['apellido'],$_POST['contacto'],$_POST['Preferencia'],$_POST['categoria'],$_POST['monitor']);
        echo "Has Actualizado Correctamente el/la  alumn@ " .$_POST['nombre'];
   }
       else{

    ?>
    <body>
        <form action="#" method="POST">
            <h1>Bienvenidos a la Tribu</h1>
            <hr />
            <h3>Inscripcion</h3>
            <hr /> 
            <label>Id de Alumno</label>
            <input type="text"   class="redondeado" name="idalumno"> <br /><br />
            <label>Nombre</label>
            <input type="text"   class="redondeado" name="nombre"> <br /><br />
            <label>Apellido</label>
            <input type="text"  class="redondeado" name="apellido"> <br /><br />
            <label>Contacto de telefono</label>
            <input type="text" class="redondeado" name="contacto" ><br /><br />
            <label>Preferencia</label><br />
            <input type="radio" name="Preferencia" value="1"> <label>Juegos</label><br />
            <input type="radio" name="Preferencia" value="2"><label>Bailes</label><br />
            <input type="radio" name="Preferencia" value="3"><label>Karaoke</label><br /><br />
            <label>Categoría que te gustaría participar</label>
            <select  class="redondeado" name="categoria"><br />
            <option selected value="0"> Categoria </option>
                <option value="1">Niño</option> 
                <option value="2">Joven</option> 
                <option value="3">Mayor</option>
            </select><br /> <br />
            <label>Monitor</label>
            <select  class="redondeado" name="monitor"><br />
            <option selected value="0"> Monitor </option>
                <option value="1">Raúl</option> 
                <option value="2">María</option> 
                <option value="3">Eva</option>
                <option value="4">Manuel</option>
            </select><br /> <br />
            <input type="submit" name="Actualizar" value="Actualizar" class="verde"/>
            <input type="submit" name="Buscar" value="Buscar" class="rojo" />
            <input type="submit" name="Eliminar" value="Eliminar" class="rosa" />
            <input type="reset" value="Reiniciar" class="gris" /><br /><br />
            <input type="submit" name="Enviar" value="Enviar" class="naranja" />
        </form>
    </body>
    <?php
       }

    ?>
</html>