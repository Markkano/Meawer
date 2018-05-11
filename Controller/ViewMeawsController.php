<?php namespace Controller;

  use Daos\MeawDao as MeawDao;

class ViewMeawsController extends Controller {

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
      echo $errorUserMsg;
      echo $errorDevMsg;
    }
    //require_once parent::View("viewAllMeawsCentralpage."); //calls the respective view.
  }

  public function Index() {
    Debug($_SESSION['kitten']);
  }

} ?>
