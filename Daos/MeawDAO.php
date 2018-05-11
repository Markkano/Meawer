<?php namespace Daos;

	use \PDOException as PDOException;
	use \Excepcion as Exception;

	class MeawDao extends SingletonDao implements Idao{

		private $table = "meaws"; //Name of the table.
		private $pdo;

		private $kittenDao;
		private $imageDAO;
		private $commentDao;

		public function __construct(){
			$this->pdo = Connection::getInstance();

			$this->kittenDao = KittenDao::getInstance();
			$this->imageDAO = ImageDAO::getInstance();
			$this->commentDao = CommentDao::getInstance();
		}



		public function insert($object){
			try {
				$stmt = $this->pdo->prepare("insert into ".$this->table."(id_kitten, id_image, publish_date, content)"
											." VALUES(?,?,?,?)");

				//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
				$params = array($object->getKitten()->getIdKitten(), 0,
								$object->getPublishDate() ,$object->getContent());
				$stmt->execute($params);
				$object->setId($this->pdo->lastInsertId());
			} catch (PDOException $e) {
				 throw $e;
			}
			return $object;
		}

		public function delete($object){}

		public function selectByID($id){}

		public function selectAll(){
			try {
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
			} catch (\Exception $e) { // it can be various types of exepctions,
					throw $e;							// but we just throw them to the controller.
			}
			return $meaws;
		}

		public function update($object){}

	}

?>
