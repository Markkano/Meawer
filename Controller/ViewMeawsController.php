<?php namespace Controller;
use Daos\KittenDAO;
use Daos\MeawDAO;
use Models\Kitten;
use Models\Meaw;

class ViewMeawsController extends Controller {

  public function __construct() {
    parent::__construct();

    if (isset($_SESSION['kitten'])) { // Esta seteada la session
      // Traigo el Kitten
      $kitten = KittenDAO::SelectByID($_SESSION['kitten']->getIdKitten());
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

  public function viewAllMeaws(){
    try {
      $meawsList = MeawDAO::SelectAll();
    } catch (\PDOException $e) {
      $errorDevMsg = $e->getMessage(); //this should not be visible for the user.
      echo $errorDevMsg;
    }
  }

  public function Index() { }

} ?>
