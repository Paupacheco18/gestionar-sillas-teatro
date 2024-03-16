<?php 
function Escenario($lista){
    // se crea la tabla
echo "<table class='tg' border='1'>";
      echo "<tr>";
      echo "<th colspan='6'>ESCENARIO</th";
      echo "</tr>";
      echo "<tr>";    
         echo "<th></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
        </tr>";
$i=1;
// imprimir el contenido de la tabla
foreach ($lista as $fila) {
    echo "<tr>";
        echo"<th>";
        echo $i;
        echo "</th>";
        foreach ($fila as $silla) {
            echo "<td>";
            echo $silla;
            echo"</td>";
        }
        echo"</tr>";
        $i++;
    }
    echo "</table";
}
?>