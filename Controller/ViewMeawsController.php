<?php namespace Controller;
use Daos\KittenDAO;
use Models\Kitten;
use Daos\MeawDAO;
use Models\Meaw;

  use Daos\MeawDao as MeawDao;

class ViewMeawsController extends Controller {

  private $kittenDAO;
  private $meawDAO;

  public function __construct() {
    parent::__construct();
    $this->kittenDAO = KittenDAO::getInstance();
    $this->meawDAO = MeawDAO::getInstance();

    if (isset($_SESSION['kitten'])) { // Esta seteada la session
      // Traigo el Kitten
      $kitten = $this->kittenDAO->SelectByID($_SESSION['kitten']->getIdKitten());
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
  }

} ?>
