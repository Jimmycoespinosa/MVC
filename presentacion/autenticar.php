<?php
session_start();
require_once('./logica/usuario.php');
//require_once('./logica/admin.php');

$idPersona=$_POST['codigo'];
$_SESSION['idPersona']=$idPersona;
$contra=$_POST['contra'];

if($idPersona==""||$contra=="")
{
	header("Location:index.php?err=1");
}
else
{
	$persona = new usuario($idPersona,"","","","",$contra);
	if($persona->autenticar())
	{
		header("Location:index.php?id=20");
	}
	else
	{
		$persona = new admin($idPersona,"","","","",$contra);
		if($persona->autenticar())
		{	header("Location:index.php?id=10");}
		else 
		{	header("Location:index.php?err=2");}				
	}
}	
?>