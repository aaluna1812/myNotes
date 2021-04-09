<?php
$host = 'localhost';
$usuario = 'root';
$clave = '';
$db = 'app_myNotes';
$conn = mysqli_connect($host, $usuario, $clave, $db) or die("Error al conectar la base de datos");
echo '<script language="javascript">alert("Conexion correcta");</script>';