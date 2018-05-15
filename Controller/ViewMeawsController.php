<?php namespace Controller;
use Daos\KittenDAO;
use Models\Kitten;
use Daos\MeawDAO;
use Models\Meaw;

  use Daos\MeawDao as MeawDao;

class ViewMeawsController extends Controller {

<<<<<<< HEAD
  private $meawDao;

  public __construct(){
    $this->meawDao = MeawDao::getInstance();
  }

  // get all the meaws ordered by creation, independent of the kittens or the timezone of them.
  public function viewAllMeaws(){

    try {
      $meawsList = $this->meawDao->selectAll();
    } catch (\PDOException $e) {
      $errorDevMsg = $e->getMessage(); //this should not be visible for the user.
      echo $errorDevMsg;
    }
    //require_once parent::View("viewAllMeawsCentralpage."); //calls the respective view.
=======
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
>>>>>>> Markkano
  }

  public function Index() {
  }

} ?>
