<?php

/* ----------------- FUNCIONES DE PARA HTML ----------------- */
// Imprime las tablas de materias de cada año y carrera
function impTabla($db, $nombreTabla, $anioImp)
{
    $query = "SELECT 
    `id`,
    `unidad_curricular`,
    `regimen`,
    `horas`,
    `correlativas`,
    `anio`
  FROM
    $nombreTabla
  WHERE
    `anio`=$anioImp
  ORDER BY `horas` ASC";

    $consulta = mysqli_query($db, $query);
    echo ("<table class='table table-bordered'>
    <thead>
      <tr>
        <th colspan='5'>{$anioImp}AÑO</th>
      </tr>
    </thead>
    <thead class='table-dark'>
      <tr>
      <th>Codigo</th>
      <th>Unidades Curriculares</th>
      <th>Régimen</th>
      <th>Horas</th>
      <th>Correlativas</th>
      </tr>
  </thead>");
    // filas de datos
    echo "<tbody>";
    /* echo "la consulta nos trajo" . $consulta; */
    while ($fila = mysqli_fetch_array($consulta)) :
        echo "<tr>";
        for ($j = 0; $j < mysqli_num_fields($consulta); $j++) {
            /* REGIMEN DE LAS DISTINTAS MATERIAS */

            if ($fila[$j]  == "1º" || $fila[$j] == "2º" || $fila[$j] == "3º") {
                continue;
            }

            if ($fila[$j] <= 0) {
                if ($fila[$j] == 0) {
                    echo "<td> Cuatr. 1 </td>";
                } elseif ($fila[$j] == -1) {
                    echo "<td> Cuatr. 2 </td>";
                } else {
                    echo "<td> Anual </td>";
                }
                continue;
            }
            echo "<td>" . $fila[$j] . "</td>";
        }
        echo ('</tr>');
    endwhile;
    echo "</tbody>
  </table>";
}


/* ----------------- FUNCIONES DEL LOGIN ----------------- */


function autenticar ($usuario="", $clave="")
{
    $sql = "SELECT * FROM datos ";
    $sql.= "WHERE username = '$usuario' ";
    $sql.= "AND password = '$clave' ";
    $sql.= "LIMIT 1";
    $matriz_usuarios = buscar_por_sql($sql);
    return (!empty($matriz_usuarios)) ? array_shift($matriz_usuarios) : false;
}

function buscar_por_sql($sql)
{
    $resultado = enviar_consulta($sql);
    $matriz_usuarios = array();
    while($registro = mysqli_fetch_array($resultado))
    {
        array_push($matriz_usuarios, $registro);
    }
    return $matriz_usuarios;
}

function enviar_consulta($sql)
{
    global $conexion;
    $ultimaConsulta = $sql;
    $resultado = mysqli_query($conexion, $sql);
    verificar_consulta($resultado, $ultimaConsulta);
    return $resultado;
}


function busquedaRepetido ($username)
{
    global $conexion;
    $sql = "SELECT * FROM datos WHERE username = '$username'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        return 1;
    } else {
        return 0;
    }
}

/* ----------------- FUNCIONES EXTRAS (si son borradas, no pasa nada) ----------------- */

function dump_debug($input, $collapse = false)
{
    $recursive = function ($data, $level = 0) use (&$recursive, $collapse) {
        global $argv;

        $isTerminal = isset($argv);

        if (!$isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT")) {
            define("DUMP_DEBUG_SCRIPT", true);

            echo '<script language="Javascript">function toggleDisplay(id) {';
            echo 'var state = document.getElementById("container"+id).style.display;';
            echo 'document.getElementById("container"+id).style.display = state == "inline" ? "none" : "inline";';
            echo 'document.getElementById("plus"+id).style.display = state == "inline" ? "inline" : "none";';
            echo '}</script>' . "\n";
        }

        $type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
        $type_data = null;
        $type_color = null;
        $type_length = null;

        switch ($type) {
            case "String":
                $type_color = "green";
                $type_length = strlen($data);
                $type_data = "\"" . htmlentities($data) . "\"";
                break;

            case "Double":
            case "Float":
                $type = "Float";
                $type_color = "#0099c5";
                $type_length = strlen($data);
                $type_data = htmlentities($data);
                break;

            case "Integer":
                $type_color = "red";
                $type_length = strlen($data);
                $type_data = htmlentities($data);
                break;

            case "Boolean":
                $type_color = "#92008d";
                $type_length = strlen($data);
                $type_data = $data ? "TRUE" : "FALSE";
                break;

            case "NULL":
                $type_length = 0;
                break;

            case "Array":
                $type_length = count($data);
        }

        if (in_array($type, array("Object", "Array"))) {
            $notEmpty = false;

            foreach ($data as $key => $value) {
                if (!$notEmpty) {
                    $notEmpty = true;

                    if ($isTerminal) {
                        echo $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "\n";
                    } else {
                        $id = substr(md5(rand() . ":" . $key . ":" . $level), 0, 8);

                        echo "<a href=\"javascript:toggleDisplay('" . $id . "');\" style=\"text-decoration:none\">";
                        echo "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
                        echo "</a>";
                        echo "<span id=\"plus" . $id . "\" style=\"display: " . ($collapse ? "inline" : "none") . ";\">&nbsp;&#10549;</span>";
                        echo "<div id=\"container" . $id . "\" style=\"display: " . ($collapse ? "" : "inline") . ";\">";
                        echo "<br />";
                    }

                    for ($i = 0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    echo $isTerminal ? "\n" : "<br />";
                }

                for ($i = 0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                echo $isTerminal ? "[" . $key . "] => " : "<span style='color:black'>[" . $key . "]&nbsp;=>&nbsp;</span>";

                call_user_func($recursive, $value, $level + 1);
            }

            if ($notEmpty) {
                for ($i = 0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                if (!$isTerminal) {
                    echo "</div>";
                }
            } else {
                echo $isTerminal ?
                    $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                    "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
            }
        } else {
            echo $isTerminal ?
                $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

            if ($type_data != null) {
                echo $isTerminal ? $type_data : "<span style='color:" . $type_color . "'>" . $type_data . "</span>";
            }
        }

        echo $isTerminal ? "\n" : "<br />";
    };

    call_user_func($recursive, $input);
}


?>