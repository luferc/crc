<?php require ("header.php"); ?>
<body>
<div id="box0">
<header>
<?php require ("menu2.php"); ?>
</header>

<ul>
<li><code>::Asignación-Citas::</code></li>
<li><?php require ("date.php"); ?></li>
</ul>
<!-- El tipo de codificación de datos, enctype, se DEBE especificar como a continuación -->
<form enctype="multipart/form-data" action="uploads.php" method="POST">
    <!-- MAX_FILE_SIZE debe preceder el campo de entrada de archivo -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
    Enviar este archivo: <input name="userfile" type="file" />
    <input type="submit" value="Subir" />
</form>
</div>
<?php require ("footer.php"); ?>
