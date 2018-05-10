<?php namespace Daos;

	use Config\Connection as Connection;


	class MeawDao extends SingletonDao implements Idao{

		private $table; //Name of the table.
		private $pdo;

		private $kittenDao;
		private $imageDAO;
		private $commentDao;

		public function __construct(){
			$this->pdo = Connection::getInstance();
			$this->table = "Meaws";

			$this->kittenDao = KittenDao::getInstance();
			$this->imageDAO = ImageDAO::getInstance();
			$this->commentDao = CommentDao::getInstance();
		}



		public function insert($object){
			$stmt = $this->pdo->prepare("insert into ".$this->table."(id_kitten, id_image, publish_date, content)"
										." VALUES(?,?,?,?)");

			//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
			$params = array($object->getKitten()->getIdKitten(), 0,
							$object->getPublishDate() ,$object->getContent());
			$stmt->execute($params);
			$object->setId($this->pdo->lastInsertId());

			return $object;
		}

		public function delete($object){}

		public function selectByID($id){}

		public function selectAll(){
			$stmt = $this->pdo->prepare("select * from ".$this->table);

			$result = $stmt.fetchAll();

			$meaws = array();
			$meaw;
			$comments;
			$imageName  = "TestImage";
			$kitten = new Kitten(1,"rodrigosoria","rodrigo","soria");

			foreach ($result as $row) {
				$kitten = $this->kittenDao->selectByID($row["id_kitten"]);
				$imageName = $this->imageDAO->selectByID($row["id_image"]);

				$meaw = new Meaw($kitten, $imageName, $row["publish_date"], $row["content"], array());
				// TODO : get comments by meaw ID and add them.
				$comments = $this->commentDao->getByMeawId();
				$meaw->setComments($comments);

				array_push($meaws, $meaw);
			}

			return $meaws;
		}

		public function update($object){}

	}

?>
