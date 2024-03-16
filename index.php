 <?
 //Desarrollador: Paula Andrea Pacheco Escalante
 //Programa de formacion: Desarrollo web con php
//Nombre de la Evidencia: Taller " Uso de formularios para transferencia "
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-Type" content="text/html; ">
    <title>Gestión de sillas de teatro</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Gestión de sillas de teatro</h1>

    <?php
    require ("escenario.php");
    require ("accion.php");

    // Verificar si se ha enviado el formulario

    if (isset($_REQUEST["Enviar"])){

        // Recuperar los datos del formulario
        $fila = $_POST['fila'];
        $puesto = $_POST['puesto'];
        $accion = $_POST['accion'];
        $StringEscenario=$_POST['lista'];

        // String oculto en el input se convierte en un Array
         $count=0;
         for($i=0; $i<5; $i++){
            for($j=0; $j<5; $j++){
                $count=5*$i+$j;
                $lista[$i][$j]=substr($StringEscenario,$count,1);
            }
            $count=0;
         }
         //el array que contiene la información actualizada del teatro se proporciona como resultado de la acción realizada por el usuario en el formulario
         $lista=Accion($fila,$puesto,$accion,$lista);
         Escenario($lista);
        }
        // se crea el else if para borrar informacion y para cargar la pagina
        else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])){
            $lista=array(array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"));
            Escenario($lista);
        }
        ?>
        <body>
            <table>
              <form method="POST">
              <input type="hidden" name="lista" value="<?php foreach ($lista as $fila) {foreach($fila as $puesto){echo $puesto;}}?>" />
              <tr>
              <td>
              <label for="puesto">Fila:</label>
            <select name="fila" id="fila">
                <?php for($i =1; $i<=5; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select> 
              </td> 
              </tr>
              <tr>
              <td>
              <label for="puesto">Puesto:</label>
            <select name="puesto" id="puesto">
                <?php for($i =1; $i<=5; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select> 
              </td> 
              </tr>
           
                <tr>
                    <td>Reservar: </td>
                    <td>
                        <input type="radio" name="accion" value="R"/>
                    </td>
                    <tr>
                        <td>Comprar: </td>
                        <td>
                            <input type="radio" name="accion" value="V"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Liberar:</td>
                        <td>
                            <input type="radio" name="accion" value="L" checked="checked"/>
                        </td>
                    </tr>
                    <tr>
                        <!--botones-->
                    <td>
                        <input type="submit" value="Enviar" name="Enviar" />
                    </td>
                    <td>
                        <input type="submit" value="Borrar" name="Reset" />
                    </td>
            </tr>
        </form>
    </table>
</body>