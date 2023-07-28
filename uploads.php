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
<?php
// En versiones de PHP anteriores a 4.1.0, $HTTP_POST_FILES debe utilizarse en lugar
// de $_FILES.

$uploaddir = '../crc/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "El archivo es válido y fue cargado exitosamente.\n";
} else {
    echo "¡Posible ataque de carga de archivos!\n";
}

echo 'Aquí hay más información de depurado:';
print_r($_FILES);

print "</pre>";

?>
</div>
<?php require ("footer.php"); ?>
