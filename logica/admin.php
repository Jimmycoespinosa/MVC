<?php
require_once('./persistencia/administradorDAO.php');
require_once('./persistencia/Conexion.php');

class admin 
{
	private $codigo;  
	private $nombre;
	private $apellido;  
	private $correo;
	private $foto;
	private $contra;

	private $administradorDAO;
	private $conexion;

	function admin($cod,$nom,$ape,$cor,$fot,$con)
	{	 
		$this->codigo=$cod;
		$this->nombre= $nom;
		$this->apellido= $ape;
		$this->correo= $cor;
		$this->foto= $fot;		
		$this->contra= $con;		
		$this->conexion = new Conexion();
		$this->administradorDAO = new AdministradorDAO($this->codigo, $this->nombre, $this->apellido, $this->correo, $this->foto, $this->contra);
	} 

	function getCodigo()
	{return $this->codigo;}

	function getNombre()
	{return $this->nombre;}

	function getApellido()
	{return $this->apellido;}

	function getCorreo()
	{return $this->correo;}

	function getFoto()
	{return $this->foto;}

	function autenticar()
	{
		$this->conexion->ejecutar($this->administradorDAO->autenticar());		
		$usuarios = array();
		$filas=$this->conexion->registro();
		return ($filas[0]==0)?false:true;
	}   

	function consultar()
	{		
		$this->conexion->ejecutar($this->administradorDAO->consultar());		
		$filas=$this->conexion->registro();
		$this->nombre=$filas['codigo'];
		$this->apellido=$filas['nombre'];
		$this->correo=$filas['apellido'];
		$this->foto=$filas['correo'];
	}
}   	
?>