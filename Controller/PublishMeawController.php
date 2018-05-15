<?php namespace Controller;

use Daos\MeawDao;
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
		include_once ;
	}

	public function SaveMeaw($content){

		$publishDate = date('Y-m-d H:i:s'); // Date of the Pulish
		try {
 			$image = ImageController::UploadImage("meawImage");
			$meaw = new Meaw($_SESSION["user"], $publishDate, $content, "", array());
			$meaw = MeawDao::Insert($meaw);
		} catch (\PDOException $e) {
			$error = "hubo un error con la base de datos.";
		} catch(\Exception $e) {
			$error = "hubo un error al subir su imagen";
		}
	}
} ?>
