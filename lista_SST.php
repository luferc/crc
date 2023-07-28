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
  xmlhttp.open("GET","get-SST_list.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<code>Selecione Plataforma:</code>
<select name="sst" onchange="showADC(this.value)">
<option value="">Selecione plataforma:</option>
<option value="SST1">SST1</option>
<option value="SST2">SST2</option>
<option value="SST3">SST3</option>
<option value="SST4">SST4</option>
<option value="SST5">SST5</option>
<option value="SST6">SST6</option>
</select>
</form>
<div id="txtHint"><b>TRILITHIC SST# >></b></div>

</body>
</html>
