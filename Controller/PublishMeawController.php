<?php namespace Controller;
	
	use Daos\MeawDao as MeawDao;
	use Models\Meaw as Meaw;

	class PublishMeawController extends Controller{

		private $MeawDao;


		public function __construct(){
			parent::__construct();
			$this->MeawDao = MeawDao::getInstance();
		}

		public function index(){
			//use require_once parent::View("Login/index"); para compartir variables
			View("Login/index");
		}

		public function saveMeaw($IdKitten, $publishDate, $content, $idImage = ""){
			$meaw = new Meaw($IdKitten, $publishDate, $content, $idImage, array());

			$meaw = $this->MeawDao->insert($meaw);
			echo($meaw->getId());
		}

	}


?>