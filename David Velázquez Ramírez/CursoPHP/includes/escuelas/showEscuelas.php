<?php

include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';

$manipulaEscuelas = new manipulaEscuelas();

$arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);

$i = 0;

if (!isset($arrayData)) {
    echo "<h2 class=" . "botonera" . ">Seleccione las opciones disponibles</h2>";
    echo "<br>";
    echo "<nav class=" . "menu_lateral" . ">
            <a href=" . "/CursoPHP/vistas/escuelas/conectorEA.php" . ">Altas</a>
        </nav>";
    echo "<br>";  
    echo "<h3 class=" . "titulo" . ">Consulta tus escuelas registradas</h3>";
    echo "<br>";
    echo "<h4>No hay escuelas registradas</h4>";
} else {
    //Codigo html de Consulta Escuelas
    echo "<h2 class=" . "botonera" . ">Seleccione las opciones disponibles</h2>";
    echo "<br>";
    echo "<nav class=" . "menu_lateral" . ">
            <a href=" . "/CursoPHP/vistas/escuelas/conectorEA.php" . ">Altas</a>
            <a href=" . "/CursoPHP/vistas/escuelas/conectorEB.php" . " class=" . "boton-menu" . ">Bajas</a>
            <a href=" . "/CursoPHP/vistas/escuelas/conectorEM.php" . ">Modificaciones</a>
        </nav>";
    echo "<br>";
    echo "<h3 class=" . "titulo" . ">Consulta tus escuelas registradas</h3>";
    echo "<div class=" . "grid-options" . ">";

    echo "<table class=" . "table" . ">";
    echo "<thead class=" . "thead-light" . ">";
    echo "<tr>";
    echo "<th>IDEscuela</th>";
    echo "<th>NombreEscuela</th>";
    echo "</tr>";
    echo "</thead>";

    while ($i != count($arrayData)) {

        echo "<tr>";
        $idescuela = $arrayData[$i]->IDEscuela;
        echo "<th> $idescuela </th>";
        $nombreEscuela = $arrayData[$i]->NombreEscuela;
        echo "<td> $nombreEscuela </td>";
        echo "</tr>";


        $i++;
    }
    echo "</table>";
    echo "</div>";
}
