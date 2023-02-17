<?php
class UsuarioDAO
	{
	private $codigo;  
	private $nombre;
	private $apellido;  
	private $correo;
	private $foto;
	private $contra;

	function UsuarioDAO($cod,$nom,$ape,$cor,$fot,$con)
	{	 
		$this->codigo=$cod;
		$this->nombre= $nom;
		$this->apellido= $ape;
		$this->correo= $cor;
		$this->foto= $fot;
		$this->contra= $con;
	} 
	
	function consultar()
	{
		return "select * from usuario where codigo='".$this->codigo."'";
	}

	function consultarTodos($orden)
	{
		return "select * from usuario order by ".$orden;
	}

	function autenticar()
	{
		//return "select count(*) from usuario where codigo='".$this->codigo."' and contra='".md5($this->contra)."'";
		return "select count(*) from usuario where codigo='".$this->codigo."' and contra='".$this->contra."';";
	}

	function insertar()
	{
		if($this->foto=="")
			//return "insert into usuario (codigo,nombre,apellido,correo,contra) values('".$this->codigo."','".$this->nombre."','".$this->apellido."','".$this->correo."','".md5($this->contra)."')"; 
			return "insert into usuario (codigo,nombre,apellido,correo,contra) values('".$this->codigo."','".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->contra."')"; 
		else
			//return "insert into usuario (codigo,nombre,apellido,correo,foto,contra) values('".$this->codigo."','".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->foto."','".md5($this->contra)."')";
			return "insert into usuario (codigo,nombre,apellido,correo,foto,contra) values('".$this->codigo."','".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->foto."','".$this->contra."')";
	}
}   	
?>