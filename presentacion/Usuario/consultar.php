<?php
	session_start();		
	require_once('./logica/usuario.php');
	echo "Jimmycos";
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
	$orden="codigo";
	if(!empty($_GET['orden']))
		{$orden=$_GET['orden'];}	
?>
<head>
<title>Insertar</title>
</head>
<body>
<div align="center"><h1>Consultar Usuario</h1></div>
<div align="right">Usted esta en el sistema como Usuario: <?php echo $usuario->getNombre()." ".$usuario->getApellido() ?></div>
<table width="100%" border="1">
	<tr>
		<td width="10%" valign="top"><?php include('presentacion/menuUsuario.php') ?></td>
		<td>
			<table border="1" align="center"> 
				<tr>
					<td><?php if($orden=="codigo") {echo "*";} ?><a href="index.php?id=21&orden=codigo"><strong>Codigo</strong></a></td>
					<td><?php if($orden=="nombre") {echo "*";} ?><a href="index.php?id=21&orden=nombre"><strong>Nombre</strong></a></td>
					<td><?php if($orden=="apellido") {echo "*";} ?><a href="index.php?id=21&orden=apellido"><strong>Apellido</strong></a></td>
					<td><?php if($orden=="correo") {echo "*";} ?><a href="index.php?id=21&orden=correo"><strong>Correo</strong></a></td>
					<td><strong>Foto</strong></td>
				</tr>				
				<?php 
					$usuario = new usuario("","","","","","");
					$usuarios = $usuario->consultarTodos($orden);
					for($i=0; $i<count($usuarios); $i++)
					{
						echo "<tr><td>".$usuarios[$i]->getCodigo()."</td>
						<td>".$usuarios[$i]->getNombre()."</td>
						<td>".$usuarios[$i]->getApellido()."</td>
						<td>".$usuarios[$i]->getCorreo()."</td>
						<td><a href='".$usuarios[$i]->getFoto()."' target='_blank'>Ver foto</a></td></tr>";
					}
				?>				
			</table>
		</td>
	</tr>
</body>
</html>
