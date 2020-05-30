<html>
    <head>
        <title>La tribu</title>
        <link rel="StyleSheet" href="./style.css" type="text/css" />
    </head>
    <?php
       require_once 'Monitor.php';
       if (isset($_POST['Enviar'])){
           $Monitor=New Monitor();
           $comprobante=$Monitor->Comprobarmonitor($_POST['idmonitor']);
        if($comprobante == true){
            echo "El Monitor ya existe";
        }
        else{
        $Monitor=New Monitor();
        $guardar=$Monitor->guardarmonitor($_POST['idmonitor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['Profesion']);
        echo "Se agregó correctamente el/la  Monitor/a " .$_POST['nombre'];
        ?>
            <p> <a href="./RegistroMonitor.php">Volver </a></p>
            <?php
       }
    }
    if (isset($_POST['Actualizar'])){
        $Monitor=New Monitor();
        $actualizar=$Monitor->Actualizarmonitor($_POST['idmonitor']);
     if($actualizar == true){
        echo "Has Actualizado Correctamente el/la  Monitor/ra " .$_POST['nombre'];
     }
    }

    elseif(isset($_POST['Eliminar'])){
        $Monitor=New Monitor();
        $borrar=$Monitor->BorrarPorId($_POST['idmonitor'],$_POST['nombre']);
        echo "Has eliminado el/la  monitor/ra " .$_POST['nombre'];
        ?>
        <p> <a href="./RegistroMonitor.php">Volver </a></p>
        <?php

   }
   elseif (isset($_POST['Buscar'])){
    ?>
                 <table border=1>
                 <tr>
                 <th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Actividad</th><th>Categoria</th>
                 </tr>
    <?php
    $Monitor=New Monitor();
 $buscar=$Monitor->buscarNombre($_POST['nombre']);
     foreach ($buscar as $f) {
             ?>
                 <tr>
             <td><?php echo $f->getNombre()?></td><td> <?php echo $f->getApellidos()?> <td><?php echo $f->getDni()?> </td><td><?php if($f->getProfesion()==1){echo "Juegos";}elseif($f->getProfesion()==2){echo "Bailes";}elseif($f->getProfesion()==3){echo "Karaoke";}?></td>
                 </tr>
                
                 <?php
         } ?>
          </table>

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
            <h3>Registrar una actividad</h3>
            <hr /> 
            <label>Id de la actividad</label>
            <input type="text"   class="redondeado" name="idmonitor"> <br /><br />
            <label>Nombre</label>
            <input type="text"   class="redondeado" name="nombre"> <br /><br />
            <label>Duracion</label>
            <input type="text"  class="redondeado" name="apellido"> <br /><br />   
            <input type="checkbox" name="confirmar"><label>Pulsa si estas de acuerdo</label><br /><br />
            <input type="submit" name="Actualizar" value="Actualizar" class="verde"/>
            <input type="submit" name="Eliminar" value="Eliminar" class="rosa" />
            <input type="reset" value="Reiniciar" class="gris" />
            <input type="submit" name="Enviar" value="Enviar" class="naranja" />
            <input type="submit" name="Buscar" value="Buscar" class="rojo" />
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