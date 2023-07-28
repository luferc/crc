
<?php
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	function Conexion()
		   	 
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="231044";		//password
		$conection['base']="crc";			//base de datos
		
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_pconnect($conection['server'],$conection['user'],$conection['pass']);


			
		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}

class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $pconeccion;
	var $pconsulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->pconeccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->pconsulta= mysql_query($cons,$this->pconeccion->getConexion());
		return $this->pconsulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->pconsulta;}	
	
	function Close()		// cierra la conexion
	{$this->pconeccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->pconsulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
}

class Receptores
{				// VARIABLES DB. ::**::
	var $nointerno; 	//variable 1
	var $estatus;		//variable 2
	var $marca;		//variable 3
	var $modelo;		//variable 4
	var $producid;		//variable 5
	var $producn;		//variable 6
	var $sn;		//variable 7
	var $rn;		//variable 8
	var $tid;		//variable 9
	var $acp;		//variable 10
	var $pe;		//variable 11
	var $services;		//variable 12
	var $ua;		//variable 13
	var $pgm;		//variable 14
	var $senal;		//variable 15
	var $programador;	//variable 16
	var $sat;		//variable 17
	var $parametros;	//variable 18
	Var $id_receptor;	//variable 19


	function Receptores($nro=0) // declara el constructor, si trae el numero de id lo busca , si no, trae todos los id
	{
		if ($nro!=0)
		{
			$obj_receptores=new sQuery();
			$result=$obj_receptores->executeQuery("select * from receptores where id_receptor = $nro"); // ejecuta la consulta
			$row=mysql_fetch_array($result);
			$this->id_receptor=$row['id_receptor'];
			$this->nointerno=$row['nointerno'];
			$this->estatus=$row['estatus'];
			$this->marca=$row['marca'];
			$this->modelo=$row['modelo'];
			$this->producid=$row['producid'];
			$this->producn=$row['producn'];
			$this->sn=$row['sn'];
			$this->rn=$row['rn'];
			$this->tid=$row['tid'];
			$this->acp=$row['acp'];
			$this->pe=$row['pe'];
			$this->services=$row['services'];
			$this->ua=$row['ua'];
			$this->pgm=$row['pgm'];
			$this->senal=$row['senal'];
			$this->programador=$row['programador'];
			$this->sat=$row['sat'];
			$this->parametros=$row['parametros'];
			}
	}

	function getReceptores() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los id's
		{
			$obj_receptores=new sQuery();
			$result=$obj_receptores->executeQuery("select * from receptores"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getID_receptor()
	 { return $this->id_receptor;}
	function getNOinterno()
	{ return $this->nointerno;}
	function getEstatus()
	 { return $this->estatus;}
	function getMarca()
	{ return $this->marca;}
	function getModelo()
	{ return $this->modelo;}
	function getProducid()
	{ return $this->producid;}
	function getProducn()
	{ return $this->producn;}
	function getSN()
	{ return $this->sn;}
	function getRN()
	{ return $this->rn;}
	function getTID()
	{ return $this->tid;}
	function getACP()
	{ return $this->acp;}
	function getPE()
	{ return $this->pe;}
	function getServices()
	{ return $this->services;}
	function getUA()
	{ return $this->ua;}
	function getPGM()
	{ return $this->pgm;}
	function getSenal()
	{ return $this->senal;}
	function getProgramador()
	{ return $this->programador;}
	function getSat()
	{ return $this->sat;}
	function getParametros()
	{ return $this->parametros;}
	
		// metodos que setean los valores
	function setNOinterno($val)
	{ $this->nointerno=$val;}	//variable 1
	function setEstatus($val)
	{ $this->estatus=$val;}		//variable 2
	function setMarca($val)
	{ $this->marca=$val;}		//variable 3
	function setModelo($val)
	{ $this->modelo=$val;}		//variable 4
	function setProducid($val)
	{ $this->producid=$val;}	//variable 5
	function setProducn($val)
	{ $this->producn=$val;}		//variable 6
	function setSN($val)
	{ $this->sn=$val;}		//variable 7
	function setRN($val)
	{ $this->rn=$val;}		//variable 8
	function setTID($val)
	{ $this->tid=$val;}		//variable 9
	function setACP($val)
	{ $this->acp=$val;}		//variable 10
	function setPE($val)
	{ $this->pe=$val;}		//variable 11
	function setServices($val)
	{ $this->services=$val;}	//variable 12
	function setUA($val)
	{ $this->ua=$val;}		//variable 13
	function setPGM($val)
	{ $this->pgm=$val;}		//variable 14
	function setSenal($val)
	{ $this->senal=$val;}		//variable 15
	function setProgramador($val)
	{ $this->programador=$val;}	//variable 16
	function setSat($val)
	{ $this->sat=$val;}		//variable 17
	function setParametros($val)
	{ $this->parametros=$val;}	//variable 18

	

	function updateReceptores()	// actualiza el cliente cargado en los atributos
	{
			$obj_receptores=new sQuery();
			$query="update receptores set nointerno='$this->nointerno', estatus='$this->estatus', marca='$this->marca', modelo='$this->modelo', producid='$this->producid', producn='$this->producn', sn='$this->sn', rn='$this->rn', tid='$this->tid', acp='$this->acp', pe='$this->pe', services='$this->services', ua='$this->ua', pgm='$this->pgm', senal='$this->senal', programador='$this->programador', sat='$this->sat', parametros='$this->parametros', last_update=now() where id_receptor = $this->id_receptor";
			$obj_receptores->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros actualizado: '.$obj_receptores->getAffect(); // retorna todos los registros afectados
	
	}
	function insertReceptores()	// inserta el cliente cargado en los atributos
	{
			$obj_receptores=new sQuery();
			$query="insert into receptores( senal, pgm, sat, parametros, estatus)values('$this->senal', '$this->pgm', '$this->sat','$this->parametros', '$this->estatus')";
			
			$obj_receptores->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros afectados: '.$obj_receptores->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteReceptores($val)	// elimina el cliente
	{
			$obj_receptores=new sQuery();
			$query="delete from receptores where id_receptor=$val";
			$obj_receptores->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return $query .'<br/>Registros afectados: '.$obj_receptores->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>
