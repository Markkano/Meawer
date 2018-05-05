<?php namespace Controller;
	
	use Daos\MeawDao as MeawDao;
	use Models\Meaw as Meaw;
	use Models\Kitten as Kitten;

	class PublishMeawController extends Controller{

		private $MeawDao;


		public function __construct(){
			parent::__construct();
			$this->MeawDao = MeawDao::getInstance();
			$_SESSION["user"] = new Kitten(1,"rodrigosoria","rodrigo","soria");
		}

		public function index(){
			//use require_once parent::View("Login/index"); para compartir variables
			//parent::View("Login/index");
		}

		public function saveMeaw($content, $imageName = ""){
			$publishDate=date('Y-m-d H:i:s');
			$meaw = new Meaw($_SESSION["user"], $publishDate, $content, $imageName, array());

			$meaw = $this->MeawDao->insert($meaw);
		}

	}


?>