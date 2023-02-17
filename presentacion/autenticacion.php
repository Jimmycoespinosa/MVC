<?php
	//session_register("idPersona");	
	//$_SESSION['idPersona']="";
	$err=0;
	if(!empty($_GET['err']))
		{$err=$_GET['err'];}
?>
<head>
<title>Sistema de Información</title>
</head>
<body>
	<div align="center"><h1>Sistema de Información</h1></div>
		<form name="Formulario" action="index.php?id=1" method="post">
			<?php
				if($err==1) 
					{echo "<div align='center' style='color:#FF0000'>Debe ingresar Codigo y Contra</div>";} 
				if($err==2) 
					{echo "<div align='center' style='color:#FF0000'>Codigo o Contra incorrectos</div>";} 
			?>
			<table border="1" align="center">
				<tr><td >Codigo</td><td><input type="text" name="codigo" value="10" required/></td></tr>
				<tr><td >Contra</td><td><input type="password" name="contra" value="d3d9446802a44259755d38e6d163e820" required/></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" name="enviar" value="Iniciar Sesion"/></td></tr>
			</table>
		</form>
	</body>
</html>
