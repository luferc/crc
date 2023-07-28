
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

class Downstream
{
	var $colonia;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $nodo;
	var $interface;
	var $ch14;
	var $ch15;
	var $ch99;
	var $ch98;
	var $mer14;
	var $mer15;
	var $mer99;
	var $mer98;
	var $dsfam;
	var $plataforma;
	var $tipotx;
	var $modelo;
	var $sst;
	var $sstfam;
	//variables p/upstream: total=10 variables
	var $snr38mhz;
	var $snr31mhz;
	var $snr25mhz;
	var $txnodo38mhz;
	var $txnodo31mhz;
	var $txnodo25mhz;
	var $txnodoatt;
	var $po;
	var $poatt;
	var $usfam;
	var $rxatt;
	var $ch03;
	var $ch94;
	var $rxnodoatt;
	var $offset;
	var $txattop;
	Var $id;
	function Downstream($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_downstream=new sQuery();
			$result=$obj_downstream->executeQuery("select * from downstreams where id = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->id=$row['id'];
			$this->colonia=$row['colonia'];
			$this->nodo=$row['nodo'];
			$this->interface=$row['interface'];
			$this->ch14=$row['ch14'];
			$this->ch15=$row['ch15'];
			$this->ch99=$row['ch99'];
			$this->ch98=$row['ch98'];
			$this->mer14=$row['mer14'];
			$this->mer15=$row['mer15'];
			$this->mer99=$row['mer99'];
			$this->mer98=$row['mer98'];
			$this->dsfam=$row['dsfam'];
			$this->plataforma=$row['plataforma'];
			$this->tipotx=$row['tipotx'];
			$this->modelo=$row['modelo'];
			$this->sst=$row['sst'];
			$this->sstfam=$row['sstfam'];
			$this->snr38mhz=$row['snr38mhz'];
			$this->snr31mhz=$row['snr31mhz'];
			$this->snr25mhz=$row['snr25mhz'];
			$this->txnodo38mhz=$row['txnodo38mhz'];
			$this->txnodo31mhz=$row['txnodo31mhz'];
			$this->txnodo25mhz=$row['txnodo25mhz'];
			$this->txnodoatt=$row['txnodoatt'];
			$this->po=$row['po'];
			$this->poatt=$row['poatt'];
			$this->usfam=$row['usfam'];
			$this->rxatt=$row['rxatt'];
			$this->ch03=$row['ch03'];
			$this->ch94=$row['ch94'];
			$this->rxnodoatt=$row['rxnodoatt'];
			$this->offset=$row['offset'];
			$this->txattop=$row['txattop'];
			}
	}
	function getDownstream() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_downstream=new sQuery();
			$result=$obj_downstream->executeQuery("select * from downstreams"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getColonia()
	 { return $this->colonia;}
	function getNodo()
	 { return $this->nodo;}
	function getInterface()
	 { return $this->interface;}
	function getCH14()
	 { return $this->ch14;}
        function getCH15()
	 { return $this->ch15;}
        function getCH99()
	 { return $this->ch99;}
        function getCH98()
	 { return $this->ch98;}
	function getMER14()
	 { return $this->mer14;}
	function getMER15()
	 { return $this->mer15;}
	function getMER99()
	 { return $this->mer99;}
	function getMER98()
	 { return $this->mer98;}
        function getDSfam()
	 { return $this->dsfam;}
        function getPlataforma()
	 { return $this->plataforma;}
        function getTipotx()
	 { return $this->tipotx;}
        function getModelo()
	 { return $this->modelo;}
        function getSST()
	 { return $this->sst;}
        function getSSTfam()
	 { return $this->sstfam;}
	function getSnr38mhz()
	 { return $this->snr38mhz;}
	function getSnr31mhz()
	 { return $this->snr31mhz;}
	function getSnr25mhz()
	 { return $this->snr25mhz;}
	function getTxnodo38mhz()
	 { return $this->txnodo38mhz;}
	function getTxnodo31mhz()
	 { return $this->txnodo31mhz;}
	function getTxnodo25mhz()
	 { return $this->txnodo25mhz;}
	function getTxnodoatt()
	 { return $this->txnodoatt;}
	function getPO()
	 { return $this->po;}
	function getPOatt()
	 { return $this->poatt;}
	function getUSfam()
	 { return $this->usfam;}
	function getRXatt()
	 { return $this->rxatt;}
	function getCH03()
	 { return $this->ch03;}
	function getCH94()
	 { return $this->ch94;}
	function getRXnodoatt()
	 { return $this->rxnodoatt;}
	function getOFFset()
	 { return $this->offset;}
	function getTXattop()
	 { return $this->txattop;}

	
		// metodos que setean los valores
	function setColonia($val)
	 { $this->colonia=$val;}
	function setNodo($val)
	 { $this->nodo=$val;}
	function setInterface($val)
	 { $this->interface=$val;}
	function setCH14($val)
	 {  $this->ch14=$val;}
	function setCH15($val)
	 {  $this->ch15=$val;}
        function setCH99($val)
	 {  $this->ch99=$val;}
	function setCH98($val)
	 {  $this->ch98=$val;}
	function setMER14($val)
	 {  $this->mer14=$val;}
	function setMER15($val)
	 {  $this->mer15=$val;}
	function setMER99($val)
	 {  $this->mer99=$val;}
	function setMER98($val)
	 {  $this->mer98=$val;}
        function setDSfam($val)
	 {  $this->dsfam=$val;}
        function setPlataforma($val)
	 {  $this->plataforma=$val;}
        function setTipotx($val)
	 {  $this->tipotx=$val;}
        function setModelo($val)
	 {  $this->modelo=$val;}
        function setSST($val)
	 {  $this->sst=$val;}
        function setSSTfam($val)
	 {  $this->sstfam=$val;}
        function setSnr38mhz($val)
	 {  $this->snr38mhz=$val;}
        function setSnr31mhz($val)
	 {  $this->snr31mhz=$val;}
        function setSnr25mhz($val)
	 {  $this->snr25mhz=$val;}
        function setTxnodo38mhz($val)
	 {  $this->txnodo38mhz=$val;}
        function setTxnodo31mhz($val)
	 {  $this->txnodo31mhz=$val;}
        function setTxnodo25mhz($val)
	 {  $this->txnodo25mhz=$val;}
        function setTxnodoatt($val)
	 {  $this->txnodoatt=$val;}
        function setPO($val)
	 {  $this->po=$val;}
        function setPOatt($val)
	 {  $this->poatt=$val;}
        function setUSfam($val)
	 {  $this->usfam=$val;}
        function setRXatt($val)
	 {  $this->rxatt=$val;}
        function setCH03($val)
	 {  $this->ch03=$val;}
        function setCH94($val)
	 {  $this->ch94=$val;}
        function setRXnodoatt($val)
	 {  $this->rxnodoatt=$val;}
        function setOFFset($val)
	 {  $this->offset=$val;}
        function setTXattop($val)
	 {  $this->txattop=$val;}
	

	function updateDownstream()	// actualiza el cliente cargado en los atributos
	{
			$obj_downstream=new sQuery();
			$query="update downstreams set colonia='$this->colonia', nodo='$this->nodo', interface='$this->interface', ch14='$this->ch14', ch15='$this->ch15', ch99='$this->ch99', ch98='$this->ch98', mer14='$this->mer14', mer15='$this->mer15', mer99='$this->mer99', mer98='$this->mer98', dsfam='$this->dsfam', plataforma='$this->plataforma', tipotx='$this->tipotx', modelo='$this->modelo', sst='$this->sst', sstfam='$this->sstfam', snr38mhz='$this->snr38mhz', snr31mhz='$this->snr31mhz', snr25mhz='$this->snr25mhz', txnodo38mhz='$this->txnodo38mhz', txnodo31mhz='$this->txnodo31mhz', txnodo25mhz='$this->txnodo25mhz', txnodoatt='$this->txnodoatt', po='$this->po', poatt='$this->poatt', usfam='$this->usfam', rxatt='$this->rxatt', ch03='$this->ch03', ch94='$this->ch94', rxnodoatt='$this->rxnodoatt', offset='$this->offset', txattop='$this->txattop', last_update=now() where id = $this->id";
			$obj_downstream->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros actualizado: '.$obj_downstream->getAffect(); // retorna todos los registros afectados
	
	}
	function insertDownstream()	// inserta el cliente cargado en los atributos
	{
			$obj_downstream=new sQuery();
			$query="insert into downstreams ( colonia, ch14, ch15, ch99, ch98, dsfam, plataforma)values('$this->colonia', '$this->ch14', '$this->ch15','$this->ch99','$this->ch98', '$this->dsfam', '$this->plataforma')";
			
			$obj_downstream->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros afectados: '.$obj_downstream->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteDownstream($val)	// elimina el cliente
	{
			$obj_downstream=new sQuery();
			$query="delete from downstreams where id=$val";
			$obj_downstream->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return $query .'<br/>Registros afectados: '.$obj_downstream->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>
