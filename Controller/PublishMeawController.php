<?php namespace Controller;

use Daos\KittenDAO;
use Daos\MeawDAO;
use Models\Meaw;
use Models\Kitten;

class PublishMeawController extends Controller{

	private $errorDevMsg;

	public function __construct(){
		parent::__construct();

		// Comprobacion de la session del Kitten
    if (isset($_SESSION['kitten'])) { // Esta seteada la session
      // Traigo el Kitten
			try {
      	$kitten = KittenDAO::SelectByID($_SESSION['kitten']->getIdKitten());
			} catch (\Exception $e) {
				// Si ocurre un problema redirigo a iniciar sesion
				header('location: '.BASE_URL.'Login/Index');
			}
      try {
        // Comprobar la contraseña
        if (strcmp($kitten->getPassword(), $_SESSION['kitten']->getPassword()) != 0 ) {
          throw new \Exception("La contraseña es diferente", 1);
        }
      } catch (\Exception $e) {
        // Redirigo a iniciar sesion
        header('location: '.BASE_URL.'Login/Index');
      }
    } else { // Debe iniciar sesion
      // Redirigo a iniciar sesion
      header('location: '.BASE_URL.'Login/Index');
    }
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
			if ($_FILES["meawImage"]["error"] != 4) {
				$image = ImageController::UploadImage("meawImage");
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
		header('location: '.BASE_URL.'ViewMeaws/');
	}
} ?>
