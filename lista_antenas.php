<html>
<head>
<script>
function showADC(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","get-antenas_list.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<code>Seleccione Antena:</code>
<select name="ant" onchange="showADC(this.value)">
<option value="">Antenas instaladas:</option>
<option value="Galaxy 13">Galaxy 13</option>
<option value="Intelsat 11">Intelsat 11</option>
<option value="Intelsat 805">Intelsat 805</option>
<option value="Galaxy 23">Galaxy 23</option>
<option value="Eutelsat 117">Eutelsat 117</option>
<option value="Intelsat 21">Intelsat 21</option>
<option value="Dish">Dish</option>
<option value="SKY">SKY</option>
<option value="Satcom C3">Satcom C3</option>
<option value="Eutelsat 113">Eutelsat 113</option>
</select>
</form>
<div id="txtHint"><b>Antenas >></b></div>

</body>
</html>
