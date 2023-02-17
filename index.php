<?php 
if(empty($_GET['id']))
	include "presentacion/autenticacion.php";
else
{
	$id=$_GET["id"];
	//Autenticacion
	if($id==1){
		include "presentacion/autenticar.php";
	}
	//Servicios Admin
	else if($id==10){
		include "presentacion/sesionAdministrador.php";
	}
	else if($id==11){
		include "presentacion/Administrador/insertar.php";
	}
	elseif($id==12){
		include "presentacion/Administrador/consultar.php";
	}
	elseif($id==13){
		include "presentacion/Administrador/editar.php";
	}
	//Servicios Usuario
	else if($id==20){
		include "presentacion/sesionUsuario.php";
	}
	elseif($id==21){
		include "presentacion/Usuario/consultar.php";
	}
	//Error
	elseif($id==-1){
		include "presentacion/sinPermiso.php";
	}
	else{
		include "presentacion/error.php";
	}	
}
