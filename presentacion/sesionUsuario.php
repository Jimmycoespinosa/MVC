<?php
	session_start();	
	require_once('./logica/usuario.php');
	$idPersona=$_SESSION['idPersona'];
	if($idPersona=="")
	{
		header("Location:index.php");
	}
	$usuario = new usuario($idPersona,"","","","","");
	$usuario->consultar();
	if($usuario->getNombre()=="")
	{
		header("Location:index.php?id=-1");
	}
?>
<head>
<title>Insertar</title>
</head>
<body>
<div align="center"><h1>Sistema de Informacion</h1></div>
<div align="right">Usted esta en el sistema como Usuario: <?php echo $usuario->getNombre()." ".$usuario->getApellido() ?></div>
<table width="100%" border="1">
	<tr>
		<td width="10%" valign="top"><?php include('presentacion/menuUsuario.php') ?></td>
		<td><h2>Bienvenido Usuario</h2>
		<h2><?php include('catalogo.php') ?></h2>
		</td>
	</tr>
</body>
</html>
