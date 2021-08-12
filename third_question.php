<?php

	//Singleton Class for Database Connection using PDO
	class Connection{
		public static $db = NULL;
		private static $instance = NULL;

		private function __construct($host, $database, $user, $password){
			$this->db = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8',$user , $password);
		}

		//GetInstance function to initialize or access current instance;
		public static function GetInstance($host, $database, $user, $password){
			if(!self::$instance)
			{

				self::$instance = new Connection($host, $database, $user, $password);
			}
			return self::$instance;
		}

		//Execute Query and Return Result fo Query
		public function Query($query,$params=array())
		{

			try {
				$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$stmt = $this->db->prepare($query);
				$stmt->execute(($params));

				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(empty($rows))
				{
					return false;
				}
				else
				{

					return $rows;
				}
			} catch(PDOException $ex) {
				var_dump($ex->getMessage());
			}

		}
	}


	//Update Database Name and Table Name below for it to run successfully
	$connection = Connection::GetInstance('localhost','database_name','root','');
	$result = $connection->Query('Select * from table_name');
	print_r($result);