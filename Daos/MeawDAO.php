<?php namespace Daos;

	use Config\Connection as Connection;

	class MeawDAO extends SingletonDao implements Idao{

		private $table; //Name of the table.
		private $pdo;

		//private $kittenDao;
		//private $commentDao;

		public function __construct(){
			$this->pdo = Connection::getInstance();
			$this->table = "Meaws";
			//$this->kittenDao = KittenDao::getInstance();
			//$this->commentDao = CommentDao::getInstance();
		}

		// IDAO functions.
		public function Insert($object){
			$stmt = $this->pdo->prepare("insert into ".$this->table."(id_kitten, id_image, publish_date, content)"
										." VALUES(?,?,?,?)");

			//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
			$params = array($object->getKitten()->getIdKitten(), 0,
							$object->getPublishDate() ,$object->getContent());
			$stmt->execute($params);
			$object->setId($this->pdo->lastInsertId());

			return $object;
		}

		public function Delete($object){ }
		public function SelectByID($id){ }

		public function SelectAll(){
			$stmt = $this->pdo->prepare("select * from ".$this->table." ORDER BY id_kitten, publish_date");

			$result = $stmt.fetchAll();

			$meaws = array();
			$meaw;
			$imageName  = "TestImage";
			$kitten = new Kitten(1,"rodrigosoria","rodrigo","soria");

			foreach ($result as $row) {
				// TODO : get Kitten and imageName before creting the meaw. because they are ordered by kittenId, we can get the meaws per kitten directly in a for. use $row["id_kitten"] and $row["id_image"] to get the data to put on the meaw.
				$meaw = new Meaw($kitten, $imageName, $row["publish_date"], $row["content"], array());
				// TODO : get comments by meaw ID and assign them.
				array_push($meaws, $meaw);
			}
			return $meaws;
		}

		public function Update($object){ }

} ?>
