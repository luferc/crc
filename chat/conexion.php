<?php

// Archivo que conecta a la base de datos
// y crea las tablas nescesarias para el chat

@ $db=mysql_connect(direccion,usuario,clave);
@ $sel=mysql_select_db(baseDeDatos,$db);
if(isset($_GET['crear'])){
  $sql = "CREATE TABLE `c_mensajes` (\n"
       . "`texto` TEXT NOT NULL ,\n"
       . "`time` BIGINT( 25 ) NOT NULL ,\n"
       . "`para` VARCHAR( 14 ) NOT NULL ,\n"
       . "`de` VARCHAR( 14 ) NOT NULL ,\n"
       . "`id` BIGINT( 25 ) NOT NULL AUTO_INCREMENT ,\n"
       . "`color` VARCHAR( 7 ) NOT NULL, INDEX (`id`) \n) TYPE = MYISAM ;";
  mysql_query($sql,$db);
  $sql = "CREATE TABLE `c_usuarios` (\n"
       . "`nombre` VARCHAR( 20 ) NOT NULL ,\n"
       . "`cookie` INT( 12 ) NOT NULL ,\n"
       . "`time` BIGINT( 25 ) NOT NULL \n) TYPE = MYISAM ;";
  mysql_query($sql,$db);
  if (mysql_error())
    echo "  <script languaje=\"JavaScript\"><!--\n",
         "    alert('No se han podido crear las tablas del chat, mysql ha devuelto un error');\n",
         "    --></script>\n  ";    
} else {
  if(!$sel)echo "  <script languaje=\"JavaScript\"><!--\n",
                "    alert('No se pudo realizar la conexion\\ncon la base de datos de MySQl\\n\\nPor favor revisa el archivo\\nconfiguracion.php');\n",
                "    --></script>\n  ";
  elseif(!(bool) mysql_query('DESCRIBE c_mensajes')){
  echo "  <script languaje=\"JavaScript\"><!--\n",
       "    con = confirm('Las tablas del chat no estan creadas\\nPHPWebChat las puede crear de\\nmanera automatica');\n",
       "    if(con)location.href = 'script.php?crear';\n",
       "    --></script>\n  ";
  }
}
?>