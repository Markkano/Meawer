<?php namespace Controller;
	
	

	public class MeawController extends Controller{

		private $MeawDao;


		public function __construct(){
			parent::__construct();
			$this->MeawDao = MeawDao::getInstance();
		}

		public function saveMeaw($IdKitten, $publishDate, $content, $idImage = ""){
			$meaw = new Meaw($IdKitten, $publishDate, $content, $idImage);

			$meaw = $this->MeawDao->insert($meaw);
			echo($meaw->getId());
		}



	}




?>