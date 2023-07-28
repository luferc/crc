<?php
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/classes/session.php");
?>

<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
 
?>

<?php require ("header.php"); ?>
<body>
<?php require ("container-header.php"); ?>
<?php require ("container-menu.php"); ?>
<div id="content">
    <div class="pagename">
<?php
echo strtoupper(" espectro ");
?>
    </div>
</div>

<div id="box0">  
<div id="box2" style="width:auto;height:475px;overflow:scroll;">
<ul>
<li><a class="activator"id="activator"href="#"onclick="javascript:window.open('espectro-detalle.php', 'noimporta', 'width=950, height=300, scrollbars=NO')">zoom</a></li>
</ul>
	<?php 
	mysql_select_db($espectro); $lista = array(); 
	$lev = array();
	$cor = array();
	$cor[0] = '#aeea00';//BASICO
	$cor[5] = '#ffd600';//DOC3
	$cor[6] = '#ffd600';//DOC3
	$cor[7] = '#ffd600';//DOC3
	$cor[8] = '#ffd600';//DOC3
	$cor[9] = '#ffd600';//DOC3
	$cor[10] = '#ffd600';//DOC3
	$cor[11] = '#ffd600';//DOC3
	$cor[12] = '#ffd600';//DOC3
	$cor[25] = '#aeea00';//BASICO
	$cor[56] = '#aeea00';//BASICO
	$cor[90] = '#aeea00';//BASICO
	$cor[98] = '#00b0ff';//DIGITALES CH 107
	$cor[123] = '#00b0ff';//DIGITALES CH 132
	$i = 0;
	$sql = "select * from espectro";
	$resultado = mysql_query($sql);
	while ($row = mysql_fetch_object($resultado))
	{
	$CH = $row->CH;
	$level = $row->level;
	$lista[$i] = $CH; $lev[$i] = $level; $i = $i + 1;
	                 }
	?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["CH", "Level dB", { role: "style" } ],
        <?php $k = $i; for ($i = 0; $i < $k; $i++) { ?>
         ['<?php echo $lista[$i] ?>', <?php echo $lev[$i] ?>, '<?php echo $cor[$i] ?>'], <?php } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "BROADCAST ESPECTRO",
        width: 400,
        height: 200,
        bar: {groupWidth: "35%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 700px; height: 200px;"></div>

<?php 

$db = dbase_open('./docs/espectro.dbf', 0); //dbase_open — Abre una base de datos en 0 solo lectura.

if ($db) {
$numero_registros = dbase_numrecords($db);
for ($i = 1; $i <= $numero_registros; $i++) {
// procesar cada uno de los registros
$temp = dbase_get_record($db, $i);
$id_ch=$temp[0];
echo"
	<div class='img'>
  <div class='desc-freq'>
	<form action='check-ch.php' method='POST'>
	<table>
	<td>
	<font size='0'color='#00CC00'>$id_ch</font>
	<input type='radio' name='ch' value='$id_ch' checked>
	<font size='0'>$temp[1]</font>
	</td>
	<td><input type='image' src='../crc/imag/plus.png' alt='Submit' width=7 height=7'>
	<font size='0'>$temp[2]</font>
	</td>
	</table>
	</form>

  </div>
     </div>
	";	//fin de echo.

}//fin ciclo for.

}//fin de condición.

?>

</div>


<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
