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
echo strtoupper(" calculador y conversor multiple (volt,amps,kw,kva)");
?>
    </div>
</div>

  <div class="package-description">

<div id="box3">
<script type="text/javascript">
function setoutput(val){
	if(val=='a'){
		document.getElementById("a").style.background="#CCCCCC";
		document.getElementById("c").style.background="#FFFFFF";
		document.getElementById("b").style.background="#FFFFFF";
	}else if(val=='b'){
		document.getElementById("b").style.background="#CCCCCC";
		document.getElementById("c").style.background="#FFFFFF";
		document.getElementById("a").style.background="#FFFFFF";
	}else if(val=='c'){
		document.getElementById("c").style.background="#CCCCCC";
		document.getElementById("a").style.background="#FFFFFF";
		document.getElementById("b").style.background="#FFFFFF";
	}
	document.getElementById('a').value='';
	document.getElementById('b').value='';
	document.getElementById('c').value='';
	
}
function calculate2(){
	var a=parseFloat(document.getElementById("a").value);
	var b=parseFloat(document.getElementById("b").value);
	var c=parseFloat(document.getElementById("c").value);
	var opt=parseFloat(document.getElementById("opt").value);
	var type=document.getElementById("type").value;
	var val=0;
	if(type=='c'){
		if(opt==1){
			c=a*b/1000;
//			a = ((c * 1000)/b);
		}else{
			c=a*b*1.732050808/1000;
//			a = ((c * 1000)/(1.73*b));
		}
		document.getElementById("c").value=c;
	}else if(type=='a'){
		if(opt==1){
			a = ((c * 1000)/b);
		}else{
			a = ((c * 1000)/(1.732050808*b));
		}
		document.getElementById("a").value=a;
	}else if(type=='b'){
		if(opt==1){
			b = ((c * 1000)/a);
		}else{
			b = ((c * 1000)/(1.732050808*a));
		}
		document.getElementById("b").value=b;
	}
}

</script>

<table style="margin:0px; width:100%">
			<tr><td colspan="2" align="center" valign="top" id="title"><h2> KVA, Cálculo de voltaje y corriente</h2></td></tr>
			<tr><td valign="top"><label>Encontrar el valor de</label></td><td><select id="type" onchange="setoutput(this.value)"><option value="a">Amps</option><option value="b">Volt</option><option value="c" selected="selected">KVA</option></select></td></tr>
			<tr><td valign="top"><label>Amps</label></td><td><input type="text" id="a" /><label>A</label></td></tr>
			<tr><td valign="top"><label>Volt</label></td><td><input type="text" id="b" /><label>V</label></td></tr>
			<tr><td valign="top"><label>KVA</label></td><td><input type="text" id="c" style="background-color:#CCCCCC" /><label></label></td></tr>
			<tr><td valign="top"><label>Tipo de Servicio</label></td><td><select id="opt"><option value="1">Monofásico</option><option value="2">Trifásico</option></select></td>
			<tr><td align="center"></td><td><input type="button" value="Calcular" id="button" onClick="calculate2()"></td></tr>
				</table>
</div>

<div id="box3">
<script type="text/javascript">
function calculate(){
	var val=document.getElementById("val").value;
	var opt=document.getElementById("from").value;
	var kva;
	var kw;
	var hp;
	var res='';
	if(opt==3){
		kw=val*0.746;
		kva=kw/0.8;
		res='';
		res=val+ " HP = "+kva+" KVA\n";
		res=res+val+ " HP = "+kw+" KW";
	}
	else if(opt==2){
		kw=val;
		kva=val/0.8;
		hp= kw / 0.746;
		res='';
		res=val+ " KW = "+kva+" KVA\n";
		res=res+val+ " KW = "+hp+" HP";
	}else{
		kw=0.8*val;
		hp= kw / 0.746;
		res='';
		res=val+ " KVA = "+kw+" KW\n";
		res=res+val+ " KVA = "+hp+" HP";
	}
	document.getElementById("res").value="===========Resultado===========\n"+res;
}
</script>
		<table style="margin:0px; width:100%">
			<tr><td colspan="2" align="center" valign="top" id="title"><h2> KVA, KW, KVA de conversión</h2></td></tr>
			<tr><td valign="top"><label></label><input id="val" type="text" onkeyup="calculate()" /> </td><td><select id="from" size="3" onchange="calculate()"><option value="1" selected="selected">KVA</option><option value="2">KW</option><option value="3">HP</option></select></label></td></tr>
			<tr><td colspan="2"><textarea id="res" cols="35"></textarea></td></tr>
			
		</table>
</div>

<?php
} else { die('<code>Acceso denegado</code>'); }
?>
</div>
<?php require ("footer.php"); ?>
