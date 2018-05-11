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
			//require_once parent::View("Login/index"); para compartir variables
			//parent::View("Login/index");
		}

		public function saveMeaw($content, $imageName = ""){
			if(isset($_SESSION['user'])){
				$publishDate=date('Y-m-d H:i:s']); //Is it the time of the people who enters a page?
				$meaw = new Meaw($_SESSION["user"], $publishDate, $content, $imageName, array());
				try {
					$meaw = $this->MeawDao->insert($meaw);
				} catch (\PDOException $e) {
					$errorDevMsg = $e->getMessage(); //this should not be visible for the user.
					echo $errorUserMsg;
					echo $errorDevMsg;
					// calls error page.
				}
			}else{
				$errorUserMsg = "Ey! you are not logged in, please go to the login page"
				 								." and confirm that you can meaw with us";
				// calls the error page.
			}


	}
?>
