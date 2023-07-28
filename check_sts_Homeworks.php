
<div style="width:auto;height:475px;overflow:scroll;">
<?php
echo '<code>Homeworks</code>';
$server = "localhost";
$user = "root";
$pass = "231044";
$db = "crc";

// Create connection
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

  $llamada_tarea = " SELECT * FROM notificador WHERE status='iniciada' ORDER BY folio_reg_id DESC "; //MUESTRA SOLO LOS CAMPOS CON ESTATUS DISPONIBLE
//$llamada_habitacion = " SELECT numero_habitacion, status_habitacion FROM habitacion "; //MUESTRA TODOS LOS CAMPOS REGISTRADOS.

$result = $conn->query($llamada_tarea);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Folio</th><th>Titulo</th><th>Estatus</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["folio_reg_id"]. "</td><td>" . $row["titulo"]. "</td><td>". $row["status"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "No homeworks	";
}

$conn->close();
?> 
</div>