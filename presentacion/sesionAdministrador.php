<?php
	session_start();	
	require_once('logica/Administrador.php');	
	$idPersona=$_SESSION['idPersona'];
	if($idPersona=="")
		{
		header("Location:index.php");
		}
	$administrador = new Administrador($idPersona,"","","","","");
	$administrador->consultar();
	if($administrador->getNombre()=="")
		{
		header("Location:index.php?id=-1");
		}	
?>
<head>
<title>Insertar</title>
</head>

<body>
<div align="center"><h1>Sistema de Informacion</h1></div>
<div align="right">Usted esta en el sistema como Administrador: <?php echo $administrador->getNombre()." ".$administrador->getApellido() ?></div>
<table width="100%" border="1">
	<tr>
		<td width="10%" valign="top"><?php include('presentacion/menuAdministrador.php') ?></td>
		<td><h2>Bienvenido Administrador</h2></td>
	</tr>

</body>
</html>
