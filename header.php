<!DOCTYPE html>
<html lang="es">
<head>
<title>CRC</title>
<meta http-equiv="Refresh" content="1200;url=#">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="author" content="Ing. Cervantes Martinez Luis Fernando" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="../crc/imag/cx2.ico" />
<link rel="stylesheet" type="text/css" media="handheld, only screen and (max-device-width: 480px)" href="../crc/css/interfaz-media.css" />
<link rel="stylesheet" type="text/css"  media="screen and (min-width: 481px)" href="../crc/css/interfaz.css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
<script>
x=0;
$(document).ready(function(){
  $("div").scroll(function(){
    $("span").text(x+=1);
  });
});
</script>
<script LANGUAGE="JavaScript"> 
var posicion1=0 
var posicion2=0 
var Retardo;
var Fin;
var Mensaje;
var go;
function TipeodeMaquina(NuevoRetardo) { 
      Retardo = NuevoRetardo; 
      if (posicion1 > Mensaje.length) { 
                  Null;
                  } 
      else { 
            document.form.caja.value = Mensaje.substring(posicion1,posicion2); 
            posicion1++; 
            } 
      Fin = setTimeout("TipeodeMaquina(Retardo) ", NuevoRetardo); 
      } 
</script> 

<script type="text/javascript">
$(document).ready(function() {
   $('#div-btn1').click(function(){
      $.ajax({
      type: "POST",
      url: "fibra_optica_panele_1.php",
      success: function(a) {
                $('#div-results').html(a);
      }
       });
   });
$('#div-btn2').click(function(){
      $.ajax({
      type: "POST",
      url: "fibra_optica_panele_2.php",
      success: function(a) {
                $('#div-results').html(a);
      }
       });
   });

$('#div-btn3').click(function(){
      $.ajax({
      type: "POST",
      url: "fibra_optica_panele_3.php",
      success: function(a) {
                $('#div-results').html(a);
      }
       });
   });

$('#div-btn4').click(function(){
      $.ajax({
      type: "POST",
      url: "fibra_optica_panele_4.php",
      success: function(a) {
                $('#div-results').html(a);
      }
       });
   });

$('#div-btn5').click(function(){
      $.ajax({
      type: "POST",
      url: "fibra_optica_panele_5.php",
      success: function(a) {
                $('#div-results').html(a);
      }
       });
   });


});
</script>




</head>
