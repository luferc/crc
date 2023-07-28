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
  xmlhttp.open("GET","get-ADC_list.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<code>Selecione Driver:</code>
<select name="adc" onchange="showADC(this.value)">
<option value="">Selecione Driver:</option>
<option value="Driver 1A">1A</option>
<option value="Driver 1B">1B</option>
<option value="Driver 1C">1C</option>
<option value="Driver 1D">1D</option>
<option value="Driver 2A">2A</option>
<option value="Driver 2B">2B</option>
<option value="Driver 2C">2C</option>
<option value="Driver 2D">2D</option>
<option value="Driver 3A">3A</option>
</select>
</form>
<div id="txtHint"><b>ADC >></b></div>

</body>
</html>
