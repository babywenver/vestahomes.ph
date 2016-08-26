<?php


	class Database 
	{
		
		
		protected $host ='localhost';
		protected $username = 'root';
		protected $password ='';
		protected $dbname ='arduino';
		protected $dbcon;
		
		
		function __construct()
		{
			
			try
			{
					$this->dbcon = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username,$this->password,
											array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
				
				
			}catch(PDOEXCEPTION $e){ echo $e->getMessage();}
		}
		
		
		public function insert($field,$data,$table)
		{
		
			try{
				
				$query_field = implode (",", $field);
				$query_data = implode ('","', $data);
				
				$insert = 'INSERT INTO '.$table.' ('.$query_field.') VALUES ("'.$query_data.'")';
				$this->dbcon->prepare($insert);
				return $this->dbcon->exec($insert);
				
			}catch(Exception $e){echo "Some Exception Occured!";}
		
		
		}
		
	}




?>