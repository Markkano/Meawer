<?php namespace Daos;

	public class MeawDao extends SingletonDao implements Idao{

		private $table; //Name of the table.
		private $pdo;

		public function __construct(){
			$this->pdo = Connection::getInstance();
			$table = "Meaws";
		}


		// IDAO functions.
		public function Insert($object){

			$stmt = $this->pdo->prepare("insert into " + $table + "(id_kitten, id_image, publis_date, content)"
										+" VALUES(?,?,?,?)");

			//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
			$params = array( $object->getKitten()->getId(), 0, 
							$object->publis_date() ,$object->getContent() );
			$stmt->execute($params);
			$object->setId(LastInsertId());

			return $object;
		}

		public function Delete($object){
			$stmt = $this->pdo->prepare("delete from " + $table
										+" where id_meaw = " + $object->getId());

			//TODO : UPLOAD IMAGE AND GET ID, ASSIGN IT TO THE OBJECT, IF IT HAVES. REPLACE THE 0.
			$params = array( $object->getKitten()->getId(), 0, 
							$object->publis_date() ,$object->getContent() );
			$stmt->execute($params);
			$object->setId(LastInsertId());

			return $object;
		}
		public function SelectByID($id){

		}
		public function SelectAll(){

		}
		public function Update($object){

		}

	}

?>