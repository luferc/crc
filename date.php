<?php
// Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";
// Obtenemos el número del día
$dia2=date("d");
// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Septiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
// Obtenemos el año
$ano=date("Y");
// Imprimimos la fecha completa
echo "<b>$dia $dia2 de $mes de $ano</b>";
// Mensaje dependiendo dia
//echo "<code><font color='black'>Clase de hoy: </font></code>";
//$dia=date("l");
//if ($dia=="Monday")
//  echo "<var>Fisico Intensivo</var>";
//if ($dia=="Tuesday")
  //echo "<var>Fisico + Boxeo</var>";
//if ($dia=="Wednesday")
 // echo "<var>Boxeo/Pateo</var>";
//if ($dia=="Thursday")
 // echo "<var>Fisico + Boxeo/Pateo</var>";
//if ($dia=="Friday")
 // echo "<var>Sparring</var>";
//if ($dia=="Saturday")
 // echo "<var>Intensiva (resistencia+condicion)</var>";
//if ($dia=="Sunday")
  //echo "<var>Buen fin de semana!!!</var>";
?>
