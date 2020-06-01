<html>
    <head>
        <title>La tribu</title>
        <link rel="StyleSheet" href="./style.css" type="text/css" />
    </head>
    <?php
       require_once 'Monitor.php';
       if (isset($_POST['Enviar'])){
           $Monitor=New Monitor($_POST['idmonitor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['Profesion']);
           $comprobante=$Monitor->Comprobarmonitor();
        if($comprobante == true){
            echo "El Monitor ya existe";
        }
        else{
        $Monitor=New Monitor($_POST['idmonitor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['Profesion']);
        $guardar=$Monitor->guardarmonitor();
        echo "Se agregó correctamente el/la  Monitor/a " .$_POST['nombre'];
        ?>
            <p> <a href="./RegistroMonitor.php">Volver </a></p>
            <?php
       }
    }
    elseif (isset($_POST['Actualizar'])){
        $Monitor=New Monitor($_POST['idmonitor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['Profesion']);
        $Monitor->Actualizarmonitor();
        ?>
        <p> <a href="./RegistroMonitor.php">Volver </a></p>
        <?php
     echo "Has Actualizado Correctamente el/la  Monitor/ra " .$_POST['nombre'];
    }

    elseif(isset($_POST['Eliminar'])){
        $Monitor=New Monitor($_POST['idmonitor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['Profesion']);
        $borrar=$Monitor->BorrarPorId();
        ?>
        <p> <a href="./RegistroMonitor.php">Volver </a></p>
        <?php
        echo "Has eliminado Correctamente el/la Monitor/ra con la ID " .$_POST['idmonitor'];
   }
   elseif (isset($_POST['Buscar'])){
    ?>
                 <table border=1>
                 <tr>
                 <th>Nombre</th><th>Apellidos</th><th>Dni</th><th>Profesion</th>
                 </tr>
    <?php
    $buscar=Monitor::BuscarMonitor($_POST['nombre']);
             ?>
                 <tr>
             <td><?php echo  $buscar['Nombre']?></td><td><?php echo  $buscar['Apellido']?></td><td><?php echo  $buscar['Dni']?></td><td><?php echo  $buscar['Profesion']?></td>
                 </tr>
                
                 <?php
          ?>
          </table>

    <p> <a href="./RegistroMonitor.php">Volver </a></p>
     <?php
}


       else{

    ?>
    <body>
    <div class="padre">
        <form action="#" method="POST">
            <h1>Bienvenidos a la Tribu</h1>
            <hr />
            <h3>Registrar un Monitor</h3>
            <hr /> 
            <label>Id del Monitor</label>
            <input type="text"   class="redondeado" name="idmonitor"> <br /><br />
            <label>Nombre</label>
            <input type="text"   class="redondeado" name="nombre"> <br /><br />
            <label>Apellido</label>
            <input type="text"  class="redondeado" name="apellido"> <br /><br />
            <label>Dni</label>
            <input type="text" class="redondeado" name="dni" ><br /><br />
            <label>Profesion</label><br />
            <input type="radio" name="Profesion" value="Juegos"> <label>Juegos</label><br />
            <input type="radio" name="Profesion" value="Bailes" checked><label>Bailes</label><br />
            <input type="radio" name="Profesion" value="Karaoke"><label>Karaoke</label><br /><br />
            
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