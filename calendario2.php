
<?php
require_once("../crc/source/activecalendar.php");
$cal=new activeCalendar();
$layout=@$_GET['css'];
function makeSelectDays($cal){
$out="";
for ($x=1;$x<=31;$x++){
if ($x==$cal->actday) $out.="<option value=".$x." selected=\"selected\">".$x."</option>\n";
else $out.="<option value=".$x.">".$x."</option>\n";
}
return $out;
}
function makeSelectMonths($cal){
$out="";
for ($x=1;$x<=12;$x++){
if ($x==$cal->actmonth) print "<option value=".$x." selected=\"selected\">".$cal->getMonthName($x)."</option>\n";
print "<option value=".$x.">".$cal->getMonthName($x)."</option>\n";
}
return $out;
}
function makeSelectYears($cal,$startYear,$endYear){
$out="";
for ($x=$startYear;$x<=$endYear;$x++){
if ($x==$cal->actyear) print "<option value=".$x." selected=\"selected\">".$x."</option>\n";
else print "<option value=".$x.">".$x."</option>\n";
}
return $out;
}

?>
<?php print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script src="../crc/data/functions.js" type="text/javascript" language="javascript"></script>
</head>
<body>



 

<table>
<tr>
<th class="tab">Fecha Inicio</th>
<td>
<select id="llegada" name="StartDay" onChange="calcula_dias();">
<?php print makeSelectDays($cal); 
$Start= makeSelectDays($cal);
?>
</select>
<select name="StartMonth">
<?php print makeSelectMonths($cal); ?>
</select>
<select name="StartYear">
<?php print makeSelectYears($cal,2016,2017); ?>
</select>
&nbsp;&nbsp;&nbsp;<a href="javascript:showcalendar('js.php?css=<?php print $layout; ?>&amp;calmode=start',270,270)" title="Calendar Start Date"><img src="../crc/imag/0084-calendar.png"width=20 height=20></a>
</td></tr>

<tr>
<th class="tab">Fecha Final</th>
<td>
<select id="salida" name="EndDay" onChange="calcula_dias();">
<?php print makeSelectDays($cal); 
$EndDay= makeSelectDays($cal);
?>
</select>
<select name="EndMonth">
<?php print makeSelectMonths($cal); ?>
</select>
<select name="EndYear">
<?php print makeSelectYears($cal,2016,2017); ?>
</select>
&nbsp;&nbsp;&nbsp;<a href="javascript:showcalendar('js.php?css=<?php print $layout; ?>&amp;calmode=end',270,270)" title="Calendar End Date"><img src="../crc/imag/0084-calendar.png"width=20 height=20></a>
</td></tr>

<tr>
<th class="tab">Dias Activos</th>
<td>
<select name="total_dias" ><option id="total_dias" selected></option></select>
</td>
<td><p id="mostrar_dias"> </p></td>
</tr>


</table>


  <script>
function calcula_dias(){
 total_dias.value = eval(salida.value) - eval(llegada.value);
 var dias = eval(salida.value) - eval(llegada.value);
 document.getElementById("mostrar_dias").innerHTML = dias;
}

function calcula_tarifa(){
 saldo_total.value = eval(tarifa.value) * (eval(salida.value) - eval(llegada.value)); // calcula el saldo total y se evia al tag input de registros.php
  var noches = eval(salida.value) - eval(llegada.value);
  var saldo = eval(tarifa.value) * noches;
  document.getElementById("mostrar_saldo").innerHTML = saldo;
  //document.getElementById("saldo_total").innerHTML = saldo;
}
</script>



</body>
</html>
