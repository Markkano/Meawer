<?php namespace Daos;
	
	use Config\Connection as Connection;

	class MeawDao extends SingletonDao implements Idao{

		private $table; //Name of the table.
		private $pdo;

		private $kittenDao;

		public function __construct(){
			$this->pdo = Connection::getInstance();
			$this->table = "Meaws";
			$this->kittenDao = KittenDao::getInstance();
		}


		// IDAO functions.
		public function Insert($object){

			$stmt = $this->pdo->prepare("insert into " + $this->table + "(id_kitten, id_image, publish_date, content)"
										+" VALUES(?,?,?,?)");

			//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
			$params = array( $object->getKitten()->getId(), 0, 
							$object->publis_date() ,$object->getContent() );
			$stmt->execute($params);
			$object->setId(LastInsertId());

			return $object;
		}

		public function Delete($object){

		}

		public function SelectByID($id){

		}
		public function SelectAll(){
			$stmt = $this->pdo->prepare("select * from ".$this->table." ORDER BY id_kitten, publish_date");

			$result = $stmt.fetchAll();
			
			$meaws = array();
			$kitten;
			$meaw;

			foreach ($result as $row) {
				$meaw = new Meaw($row["id_kitten"], $row["id_image"], $row["publish_date"], $row["content"], array());
				// TODO : get comments.
				

			}

		}
		public function Update($object){

		}

	}

?>