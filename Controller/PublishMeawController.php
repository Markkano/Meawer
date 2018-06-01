<?php namespace Controller;

use Daos\KittenDAO;
use Daos\MeawDAO;
use Models\Meaw;
use Models\Kitten;

class PublishMeawController extends Controller{

	private $errorDevMsg;

	public function __construct(){
		parent::__construct();
		parent::CheckSession();
	}

	public function Index() {
		// Realmente no se deberia llamar este metodo
		throw new \Exception("Error Processing Request", 1);

	}

	public function SaveMeaw($content){
		$publishDate = date('Y-m-d H:i:s'); // Date of the Pulish
		try {
			$image = null;
			// Subo la imagen del meaw
			if(isset($_FILES["meawImage"])){
				if ($_FILES["meawImage"]["error"] != 4) {
					$image = ImageController::UploadImage("meawImage");
      			}
      		}
			// Creo el Meaw
			$meaw = new Meaw($_SESSION["kitten"], $publishDate, $content, $image, array());
			// Lo inserto en la base de Datos
			$meaw = MeawDao::Insert($meaw);
		} catch (\PDOException $e) {
			$error = "Ocurrio un error con la base de datos.";
		} catch(\Exception $e) {
			$error = "Ocurrio un error al subir su imagen";
		}
		header('location: '.BASE_URL.'ViewMeaws/Index');
	}
} ?>
