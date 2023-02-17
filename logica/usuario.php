<?php
require_once('./persistencia/UsuarioDAO.php');
require_once('./persistencia/Conexion.php');

class usuario 
{
	private $codigo;  
	private $nombre;
	private $apellido;  
	private $correo;
	private $foto;
	private $contra;
	
	private $usuarioDAO;
	private $conexion;
	
	function usuario($cod,$nom,$ape,$cor,$fot,$con)
	{
		$this->codigo=$cod;
		$this->nombre= $nom;
		$this->apellido= $ape;
		$this->correo= $cor;
		$this->foto= $fot;		
		$this->contra= $con;		
		$this->conexion = new Conexion();
		$this->usuarioDAO = new UsuarioDAO($this->codigo, $this->nombre, $this->apellido, $this->correo, $this->foto, $this->contra);
	} 

	function getCodigo()
	{
		return $this->codigo;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getApellido()
	{
		return $this->apellido;
	}

	function getCorreo()
	{
		return $this->correo;
	}

	function getFoto()
	{
		return $this->foto;
	}

	function consultar()
	{		
		$this->conexion->ejecutar($this->usuarioDAO->consultar());		
		$filas=$this->conexion->registro();
		//var_dump($filas);
		$this->nombre=$filas['nombre'];
		$this->apellido=$filas['apellido'];
		$this->correo=$filas['correo'];
	}   

	function insertar()
	{
		$this->conexion->ejecutar($this->usuarioDAO->insertar());
	}

	function consultarTodos($orden)
	{
		$this->conexion->ejecutar($this->usuarioDAO->consultarTodos($orden));		
		$usuarios = array();
		$numReg=0;
		while($filas=$this->conexion->registro())
		{
			$usuario = new usuario($filas['codigo'],$filas['nombre'],$filas['apellido'],$filas['correo'],$filas['foto'],"");
			$usuarios[$numReg]=$usuario;
			$numReg++;
		}				
		return $usuarios;
	}   

	function autenticar()
	{		
		$this->conexion->ejecutar($this->usuarioDAO->autenticar());
		$filas=$this->conexion->registro();
		return (count($filas)==0)?false:true;	
	}
}   	
?>