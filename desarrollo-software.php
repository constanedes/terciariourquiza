<?php
include('includes/head.php');
include('includes/nav.php');

require('db/db.php');
$tabla = 'SELECT `id`, `unidad_curricular`, `regimen`, `horas`, `anio` FROM `desarrrollo_software` ORDER BY `regimen` DESC, `horas` ASC';
$consulta = mysqli_query($conn,$tabla);

?>

<p>
  Técnico Superior en Desarrollo de Software participa en proyectos de desarrollo de software desempeñando roles que
  tienen por objeto producir artefactos de software (programas, módulos, objetos).
  Estos artefactos suelen integrarse en aplicaciones o subsistemas que interactúan entre sí, con otras aplicaciones ya
  existentes desarrolladas con la misma o distinta tecnología, con el sistema operativo
  del computador u otro software de base (motor de base de datos, navegador, monitor de comunicaciones) configurando
  distintas capas de software que pueden estar distribuidas en diversas máquinas situadas
  en la misma o distintas ubicaciones. </p>El

<ul>Las funciones del Técnico Superior en Desarrollo de Software son:
  <li>Modelizar artefactos de software a partir de especificaciones, refinándolas en caso necesario,
    para determinar el diseño detallado y las características de una solución que las satisfaga en
    el contexto de la arquitectura del sistema de software del cual van a formar parte.</li>
  <li>Construir los artefactos de software que implementen el diseño realizado, aplicando patrones o
    reutilizando código en la medida en que resulte posible. Al hacer esto, y en función de lo acordado
    para el proyecto, optimizará el desempeño de lo que construya aplicando buenas prácticas de programación
    y documentación.</li>
  <li>Verificar los artefactos de software construidos considerando las necesidades de cobertura de la prueba.
    Para ello diseña los casos considerando el entorno de pruebas y ejecuta pruebas unitarias, así como registra
    los datos y resultados. De ser necesario, realiza acciones correctivas sobre el código hasta asegurarse de que
    cumpla con las especificaciones recibidas.</li>
  <li>Revisar el código de artefactos de software para resolver defectos o mejorarlo. Este código puede ser propio o
    ajeno. Esta actividad comprende revisiones cruzadas con otros integrantes del proyecto para asegurar la calidad
    del producto. Algunas asignaciones requieren una revisión de código ya existente para poder ampliar funcionalidades
    o refactorizarlo.</li>
  <li>Documentar sus actividades y los resultados obtenidos aportando elementos para asegurar la calidad de los
    proyectos de acuerdo con normas y estándares establecidos.</li>
  <li>Gestionar sus propias actividades dentro del equipo de trabajo del proyecto. Ello comprende la planificación
    (organización y control) de las tareas a realizar, el oportuno reporte de avances y dificultades y el registro
    y reflexión sobre lo realizado para capitalizar experiencias y estimar métricas aplicables a su actividad.</li>
  <li>Interactuar con los diferentes roles ocupacionales y áreas organizacionales, mediante un trabajo en equipo de
    carácter cooperativo, con capacidad para negociar, argumentar y articular propuestas, necesidades y expectativas.
  </li>
  <li>Generar propuestas innovadoras y/o emprendimientos productivos propios del ámbito del desarrollo de software.</li>
</ul>

<br><br><br><br><br>

<table class="table table-bordered">
  <thead>
    <tr>
      <th colspan="5">1°AÑO</th>
    </tr>
  </thead>
  <?php echo("<thead class='table-dark'>
            <tr>");
    // encabezado
    for($i = 0;$i < mysqli_num_fields($consulta); $i++):
    $infoCampo = mysqli_fetch_field_direct($consulta, $i);
    echo("<th> $infoCampo->name </th>");
    endfor;
    echo ("</tr>
        </thead>");
    ?>
  <?php
    // filas de datos
    echo "<tbody>";
    while($fila = mysqli_fetch_array($consulta)):  
        echo "<tr>";
        for($j = 0; $j < mysqli_num_fields($consulta); $j++){
      
          /* REGIMEN DE LAS DISTINTAS MATERIAS */
          if($fila[$j] <= 0){
            if($fila[$j] == 0) {
              
              echo "<td> Cuatr. 1 </td>"; 
            }
            elseif($fila[$j] == -1) {
              echo "<td> Cuatr. 2 </td>"; 
            }
            else {
              echo "<td> Anual </td>";
            }
            continue;
          }
          echo "<td>" . $fila[$j] . "</td>";  
        }
        echo ('</tr>');
    endwhile;
    echo "</tbody>
    <div> </div>"
    ?>
</table>



<br><br><br><br><br>


<table class="table table-bordered">
  <thead>
    <tr>
      <th colspan="5">3°AÑO</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Unidades Curriculares</th>
      <th>Régimen</th>
      <th>Horas</th>
      <th>Correlativas</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>3.1.1</th>
      <td>Ética y Responsabilidad Social</td>
      <td>Cuatr. 1</td>
      <td>3</td>
      <td>-</td>
    </tr>
    <tr>
      <th>3.2.1</th>
      <td>Derecho y Legislación Laboral</td>
      <td>Cuatr.2</td>
      <td>3</td>
      <td>3.1.1</td>
    </tr>
    <tr>
      <th>3.0.1</th>
      <td>Redes y Comunicación</td>
      <td>Anual</td>
      <td>4</td>
      <td>-</td>
    </tr>
    <tr>
      <th>3.0.2</th>
      <td>Programación II</td>
      <td>Anual</td>
      <td>6</td>
      <td>-</td>
    </tr>
    <tr>
      <th>3.0.3</th>
      <td>Gestión de Proyectos de Software</td>
      <td>Anual</td>
      <td>4</td>
      <td>-</td>
    </tr>
    <tr>
      <th>3.0.4</th>
      <td>Bases de Datos II</td>
      <td>Anual</td>
      <td>4</td>
      <td>-</td>
    </tr>
    <tr>
      <th>3.0.5</th>
      <td>Practica Profesionalizante II</td>
      <td>Anual</td>
      <td>6</td>
      <td>-</td>
    </tr>
  </tbody>
</table>