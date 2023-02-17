<?php
	session_start();	
	require_once('./logica/usuario.php');
	require_once('./logica/admin.php');
	$idPersona=$_SESSION['idPersona'];	
	if($idPersona=="")
	{
		header("Location:index.php");
	}
	echo "Jimmycs";
	$administrador = new admin($idPersona,"","","","","");
	$administrador->consultar();
	if($administrador->getNombre()=="")
	{
		header("Location:index.php?id=-1");
	}	
	$insertado=false;
	if(!empty($_POST['enviar']))
	{
		$insertado=0;
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];

		$foto=$_FILES['foto']['name'];		
		$rutaservidor="";
		if($foto!="")
		{
			$rutalocal=$_FILES['foto']['tmp_name'];		
			$rutaservidor = "fotos/".$codigo."_".str_replace(" ","_",$foto);	
			$tipo=$_FILES['foto']['type'];
			if($_FILES['foto']['size']>100000)
				{$insertado=2;}
			else if($tipo!="image/pjpeg" && $foto!="") 
				{$insertado=3;}
			else
				{copy($rutalocal,$rutaservidor);}
		}
		if($insertado==0)
		{
			$usuario = new usuario($codigo, $nombre, $apellido, $correo, $rutaservidor, $codigo);
			$usuario->insertar();		
			$insertado=1;				
		}
	}
	
?>
<head>
<title>Insertar</title>
</head>

<body>
<div align="center"><h1>Insertar Usuario</h1></div>
<div align="right">Usted esta en el sistema como Administrador: <?php echo $administrador->getNombre()." ".$administrador->getApellido() ?></div>
<table width="100%" border="1">
	<tr>
		<td width="10%" valign="top"><?php include('presentacion/menuAdministrador.php') ?></td>
		<td>
			<?php 
			if($insertado==1) 
				{echo "<div align='center' style='color:#FF0000'>El usuario con nombre: ".$nombre." ".$apellido." ha sido insertado</div>";} 
			else if($insertado==2) 	
				{echo "<div align='center' style='color:#FF0000'>La foto debe ser de 200 Kb</div>";} 
			else if($insertado==3) 	
				{echo "<div align='center' style='color:#FF0000'>La foto debe ser jpg</div>";} 
			?>		
			<form name="formulario" action="../index.php?id=11" method="post" enctype="multipart/form-data">
				<table align="center" border="1">
					<tr>
						<td>Codigo</td>
						<td><input type="text" name="codigo" value="<?php echo $codigo; ?>" /></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nombre" value="<?php echo $nombre; ?>" /></td>
					</tr>
					<tr>
						<td>Apellido</td>
						<td><input type="text" name="apellido" value="<?php echo $apellido; ?>" /></td>
					</tr>
					<tr>
						<td>Correo</td>
						<td><input type="text" name="correo" value="<?php echo $correo; ?>" /></td>
					</tr>
					<tr>
						<td>Correo</td>
						<td><input type="file" name="foto" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar" /><input type="reset" value="Limpiar" /></td>
					</tr>
				</table>		
			</form>
		</td>
	</tr>
</body>
</html>
