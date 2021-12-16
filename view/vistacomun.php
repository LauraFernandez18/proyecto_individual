<?php
echo "<table class='column'>";
        echo "<tr>";
        echo "<td><h3>{$mesa['nombre_mesa']}</h3></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><img src='../img/{$mesa['foto_ubi']}'></td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td><p>{$mesa['tipo_ubi']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_silla_dispo']}</p></td>";
        echo "</tr>";