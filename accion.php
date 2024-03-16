<?php
function Accion($fila,$puesto,$accion,$lista){
    /*se evalua la opcion del usuiaro dependiendo de lo contenido en el array si el puesto elegido por el usuario esta libre se modifica el array con la accion elegida*/
    if ($lista[$fila-1][$puesto-1]=="L"){
        $lista[$fila-1][$puesto-1]=$accion;
    }
    else if ($lista[$fila-1][$puesto-1]=="V"){
        echo "<script>alert('";
            if ($accion=="L" || $accion=="R" || $accion=="V"){echo " No permitido";}
            echo "')";
            echo "</script>'";
    }
    // si el puesto esta reservado se modifica el array con la accion elegida por el usuiario
    else if ($lista[$fila-1][$puesto-1]=="R" && $accion!="R"){
        $lista[$fila-1][$puesto-1]=$accion;
    }
    return $lista;
}
?>
