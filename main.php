<?php
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 * Modified by: Arman G. de Castro, October 3, 2008
 * email: armandecastro@gmail.com
 */
include("include/classes/session.php");
?>

<?php require ("header.php"); ?>
<body>
<div id="box1">
<table>
  <tr><td>

<?php
/**
 * User has already logged in, so display relevant links, including
 * a link to the admin center if the user is an administrator.
 */
 
 if (($session->logged_in) && ($session->isMember())){
      	echo "<h1>Logged In</h1>";
   		echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       		."[<a href=\"userinfo.php?user=$session->username\">My Account</a>]   "
       		."[<a href=\"useredit.php\">Edit Account</a>]   ";
	   	echo "[<a href=\"process.php\">Logout</a>]";
      echo "[<a href=\"404.php\">CONSULTAS</a>]   ";

} elseif (($session->logged_in) && ($session->isAgent())) {
  		echo "<h1>Agente</h1>";
   		echo "acceso correcto: <code>$session->username</code> <br><br>"
       		."[<a href=\"userinfo.php?user=$session->username\">My Account</a>]   "
	   		."[<a href=\"member_register.php?user=$session->username\">Add Member</a>]   "
       		."[<a href=\"useredit.php\">Edit Account</a>]   ";
		echo "[<a href=\"agent/agent.php\">Agent Center</a>] ";
		echo "[<a href=\"consul-general.php\">Operador</a>]   ";
      		echo "[<a href=\"process.php\">Logout</a>]";
		
} elseif (($session->logged_in) && ($session->isMaster())) {
  		echo "<h1>Logged In</h1>";
   		echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       		."[<a href=\"userinfo.php?user=$session->username\">My Account</a>]   "
	   		."[<a href=\"agent_register.php?user=$session->username\">Add Agent</a>]   "
       		."[<a href=\"useredit.php\">Edit Account</a>]   ";
	    echo "[<a href=\"master/master.php\">Master Center</a>] ";
		echo "[<a href=\"process.php\">Logout</a>]";

} elseif (($session->logged_in) && ($session->isAdmin())) {
  		echo "<h1>Logged In</h1>";
   		echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       		."[<a href=\"userinfo.php?user=$session->username\">My Account</a>]   "
	   		."[<a href=\"master_register.php?user=$session->username\">Add Master</a>]   "
       		."[<a href=\"useredit.php\">Edit Account</a>]   ";
	    echo "[<a href=\"admin/admin.php\">Admin Center</a>] ";
	    echo "[<a href=\"process.php\">Logout</a>]";

} else {
//echo "try to log the following: <br> ";
//echo "user:admin password:admin <br>";
//echo "user:master1-2 password:master1-2 <br>";
//echo "user:master1agen1 - 2 password:agent1 - 2<br> ";
//echo "user:master1agent1member1 password:member1 <br>";
//echo "user:master2agent1member1 password:member1 <br>";

    //echo "NO LOGIN YET!";
?>


<?php
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error!!!</font>";
}
?>
<!-- <form action="process.php" method="POST"> -->
<form action="process.php" method="POST"> 

<p>Usuario</p>
  <input type="text" name="user" maxlength="10" value="<?php echo $form->value("user"); ?>"><?php echo $form->error("user"); ?>

<p>Contraseña</p>
  <input type="password" name="pass" maxlength="10" value="<?php echo $form->value("pass"); ?>"><?php echo $form->error("pass"); ?>
<br>
<p>Recordar sesión
<input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?>>
</p>

<input type="hidden" name="sublogin" value="1">
<input type="submit" id="btregistro"value="Entrar">
<br><a class="one" href="forgotpass.php">[Recuperar contrase&ntilde;a]</a>
</form>

<?php
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
echo "</td></tr><tr><td align=\"center\">";
echo "Usuarios Total: ".$database->getNumMembers()."<br>";
echo "Online: $database->num_active_users <br>";
echo "Visitante: $database->num_active_guests <br>";

include("include/classes/view_active.php");
//echo $session->userlevel;
?>

</table>
</div>

</body>
</html>
