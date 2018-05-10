<?php namespace Daos;

	use Config\Connection as Connection;


	class MeawDao extends SingletonDao implements Idao{

		private $table; //Name of the table.
		private $pdo;


		public function __construct(){
			$this->pdo = Connection::getInstance();
			$this->table = "comments";

		}

    public function selectByMeawID($id){
      // TODO : implementation when doing the respective US.
      $comments = array();
      return $comments;
    }

    public function insert($object){}
    public function Delete($object){}
    public function SelectByID($id){}
    public function SelectAll(){}
    public function Update($object){}
