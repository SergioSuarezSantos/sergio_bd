<html>
    <head>
        <title>La tribu</title>
        <link rel="StyleSheet" href="./style.css" type="text/css" />
    </head>
    <?php
       require_once 'Alumno.php';
       if (isset($_POST['Enviar'])){
        $comprobante=Alumno::Comprobar($_POST['idalumno']);
        if($comprobante == true){
            echo "EL alumno ya existe";
        }
        else{
        Alumno::guardar($_POST['idalumno'],$_POST['nombre'],$_POST['apellido'],$_POST['contacto'],$_POST['Preferencia'],$_POST['categoria'],$_POST['monitor']);
        echo "Se agregó correctamente el/la  alumn@ " .$_POST['nombre'];
        ?>
            <p> <a href="./Inscripcion.php">Volver </a></p>
            <?php
       }
    }
       elseif (isset($_POST['Buscar'])){
           ?>
                        <table border=1>
                        <tr>
                        <th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Actividad</th><th>Categoria</th><th>Monitor</th>
                        </tr>
           <?php
        $resul=Alumno::buscarNombre($_POST['nombre']);
            foreach ($resul as $f) {
                    ?>
                        <tr>
                    <td><?php echo $f->getNombre()?></td><td> <?php echo $f->getApellidos()?> <td><?php echo $f->getTelefono()?> </td><td><?php if($f->getActividad()==1){echo "Juegos";}elseif($f->getActividad()==2){echo "Bailes";}elseif($f->getActividad()==3){echo "Karaoke";}?></td> <td><?php if ($f->getCategoria()==1){echo "5-10 años";}elseif($f->getCategoria()==2){echo "10-15 años";}elseif($f->getCategoria()==3){echo "16-23 años";}?></td> <td><?php if($f->getMonitor()==1){echo "Manuel";}elseif($f->getMonitor()==2){echo "Maria";}elseif($f->getMonitor()==3){echo "Eva";}elseif($f->getMonitor()==4){echo "Rodolfo";}?></td>
                        </tr>
                       
                        <?php
                } ?>
                 </table>

           <p> <a href="./Inscripcion.php">Volver </a></p>
            <?php
       }
       elseif(isset($_POST['Eliminar'])){
            Alumno::BorrarPorId($_POST['idalumno'],$_POST['nombre']);
            echo "Has eliminado el/la  alumn@ " .$_POST['nombre'];
            ?>
            <p> <a href="./Inscripcion.php">Volver </a></p>
            <?php
   
       }
       elseif(isset($_POST['Actualizar'])){
        Alumno::ActualizarAlumno($_POST['idalumno'],$_POST['nombre'],$_POST['apellido'],$_POST['contacto'],$_POST['Preferencia'],$_POST['categoria'],$_POST['monitor']);
        echo "Has Actualizado Correctamente el/la  alumn@ " .$_POST['nombre'];
        ?>
            <p> <a href="./Inscripcion.php">Volver </a></p>
            <?php
   }
       else{

    ?>
    <body>
    <div class="padre">
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
                <option value="1">5-9 años</option> 
                <option value="2">10-15 años</option> 
                <option value="3">16-23 años</option>
            </select><br /> <br />
            <label>Monitor</label>
            <select  class="redondeado" name="monitor"><br />
            <option selected value="0"> Monitor </option>
                <option value="1">Raúl</option> 
                <option value="2">María</option> 
                <option value="3">Eva</option>
                <option value="4">Manuel</option>
            </select><br /> <br />
            <input type="checkbox" name="confirmar"><label>Pulsa si estas de acuerdo</label><br /><br />
            <input type="submit" name="Actualizar" value="Actualizar" class="verde"/>
            <input type="submit" name="Buscar" value="Buscar" class="rojo" />
            <input type="submit" name="Eliminar" value="Eliminar" class="rosa" />
            <input type="reset" value="Reiniciar" class="gris" /><br /><br />
            <input type="submit" name="Enviar" value="Enviar" class="naranja" />
        </form>
        </div>
        <div class="rsocial">
		<a href="#"><img src="./img/instagram.png" value="Instagram" class="insta"></a>
		<a href="#"><img src="./img/youtube.png" value="youtube" class="youtube"></a>
		<a href="#"><img src="./img/facebook.png" value="Facebook" class="facebook"></a>
	</div>
    </body>
    <?php
       }

    ?>
</html>