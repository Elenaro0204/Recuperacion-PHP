<?php
function mostrarProductos($productos)
{
    foreach ($productos as $i => $p) {
        echo "$i: " . $p->mostrar() . "<br>";
    }
}
?>
