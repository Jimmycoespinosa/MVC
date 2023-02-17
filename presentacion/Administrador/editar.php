<?php
	session_start();	
	require_once('./logica/Usuario.php');
	require_once('./logica/Administrador.php');	
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
	$usuario = new Usuario($_GET['codigoEdit'],"","","","","");
	$usuario->consultar();
	
	
?>




<head>
<title>Insertar</title>
</head>

<body>
<div align="center"><h1>Editar Usuario</h1></div>
<div align="right">Usted esta en el sistema como Administrador: <?php echo $administrador->getNombre()." ".$administrador->getApellido() ?></div>
<table width="100%" border="1">
	<tr>
		<td width="10%" valign="top"><?php include('presentacion/menuAdministrador.php') ?></td>
		<td>
			<?php if($insertado) {echo "<div align='center' style='color:#FF0000'>El usuario con nombre: ".$nombre." ".$apellido." ha sido insertado</div>";} ?>		
		<form name="formulario" action="../index.php?id=11" method="post" >
			<table align="center" border="1">
				<tr>
					<td>Codigo</td>
					<td><input type="text" name="codigo" value="<?php echo $usuario->getCodigo() ?>" readonly="true" /></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>"/></td>
				</tr>
				<tr>
					<td>Apellido</td>
					<td><input type="text" name="apellido" value="<?php echo $usuario->getApellido() ?>"/></td>
				</tr>
				<tr>
					<td>Correo</td>
					<td><input type="text" name="correo" value="<?php echo $usuario->getCorreo() ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar" /></td>
				</tr>
			</table>		
			</form>
		</td>
	</tr>

</body>
</html>
