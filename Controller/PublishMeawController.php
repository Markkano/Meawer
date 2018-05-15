<?php namespace Controller;

	use Daos\MeawDao as MeawDao;
	use Models\Meaw as Meaw;
	use Models\Kitten as Kitten;

	class PublishMeawController extends Controller{

		private $errorDevMsg;
		private $MeawDao;

		public function __construct(){
			parent::__construct();
			$this->MeawDao = MeawDao::getInstance();
			$_SESSION["user"] = new Kitten("rodrigosoria", "rodrigosoria.epic@gmail.com", "1234", "Rodrigo", "Soria", date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			if(!isset($_SESSION['user'])){
				$error = "Ey! you are not logged in, please confirm that you can meaw with us";
				// calls the error page.
			}
		}

		public function index(){
			//require_once parent::View("PublishMeaw", "index"); // para compartir variables
			//require_once parent::View();
			require_once "Views/PublishMeaw/publishMeaw.php";
		}

		public function saveMeaw($content, $image = ""){

				$publishDate=date('Y-m-d H:i:s'); //Is it the time of the people who enters a page?
				try {
					if ($image == ""){
						 ImageController::UploadImage("meawImage");
					}
					$meaw = new Meaw($_SESSION["user"], $publishDate, $content, "", array());
					$meaw = $this->MeawDao->insert($meaw);
				} catch (\PDOException $e) {
					$this->errorDevMsg = $e->getMessage(); //this should not be visible for the user.
					$error = "hubo un error con la base de datos.";
					echo $this->errorDevMsg;
				} catch(\Exception $e){
					$this->errorDevMsg = $e;
					$error = "hubo un error al subir su imagen";
				}
	}
}
?>
