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


<div id="content">
    <div class="pagename">
<?php
echo strtoupper("Espectro BROADCAST HUB VTA");
?>
    </div>
</div>
<!-- 
<a href="updates-senal.php"> <img src="../crc/imag/undo.png"width=25 height=25 border=0 alt="back"></a>
-->
<div id="box2">
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
        title: "ESPECTRO BROADCAST HUB VTA",
        width: 1000,
        height: 200,
        bar: {groupWidth: "35%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 1000px; height: 200px;"></div>

</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
