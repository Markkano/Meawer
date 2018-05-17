<?php namespace Controller;
use Daos\KittenDAO;
use Daos\MeawDAO;
use Models\Kitten;
use Models\Meaw;

class ViewMeawsController extends Controller {

  public function __construct() {
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

  public function ViewAllMeaws() {
    try {
      // Traigo la lista de Meaws
      $meawsList = MeawDAO::SelectAll();
      //Debug($meawsList);
    } catch (\PDOException $e) {
      $error = "Ocurrio un problema al traer la lista de Meaws. Por favor reintente mas tarde";
    }
    // Llamo a la vista
    include_once parent::View("viewMeaws");
  }

  public function Index() {
    // Es la funcion de la Controladora, debe mostrar los Meaws
    $this->ViewAllMeaws();
  }
} ?>
