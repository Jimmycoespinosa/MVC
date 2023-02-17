<?php

class Conexion 
{
	var $con;
	var $resultado;
	var $ArrayRes;
	
	//Funciones mysql_connect obsoletas, se realiza cambios.
	function conexion()
	{
		ini_set('display_errors',1);
		error_reporting(E_ALL);
		$this->con= new mysqli("localhost", "jimmyco", "sophia", "primerproyecto");
		//mysql_select_db("primerproyecto", $this->con);No es necesario.
		if ($this->con->connect_errno) {
			echo "Connect failed: ".$this->con->connect_error;
			exit();
		}
	}  	
	
	function ejecutar($sentencia)
	{
		$this->resultado = $this->con->query($sentencia);
		//$this->resultado=mysql_query($sentencia,$this->con) or die (mysql_error());
		if (!$this->resultado){
			echo "Errormessage: ".$this->con->error;
		}
		//$this->ArrayRes = mysqli_fetch_array($this->resultado);
		return $this->resultado;
	}
	
	function liberar()
	{
		//mysql_free_result($this->resultado);
		$this->resultado->free();
	}
	
	function cerrar()
	{
		//mysql_close($this->con);
		$this->con->close();
	}
	
	function filas()
	{
		return $this->resultado->num_rows;
		//return mysql_num_rows($this->resultado);
	}
	
	function campos()
	{
		return $this->resultado->field_count;
		//return mysql_num_fields($this->resultado);
	}
	
	function registro()
	{
		//var_dump($this->resultado->fetch_assoc());
		return $this->resultado->fetch_assoc();
		//return mysql_fetch_row($this->resultado);
	}
}  
?>
