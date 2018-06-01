<?php namespace Controller;

use Daos\KittenDAO;

abstract class Controller {

  public function __construct() {}

  protected function View($view = "", $controller = "") {
    $trace = debug_backtrace();
    if (isset($trace[1])) {
      if (strcmp($controller, "") == 0) {
        $controller = substr(strrchr($trace[1]['class'], '\\'), 1);
      }
      if(strcmp($view, "") == 0) {
          $view = $trace[1]['function'];
      }
      $controller = str_replace("Controller", "", $controller);
      $path = "Views/".$controller."/".$view.".php";

      return $path;
    }
  }

  protected function CheckSession() {
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
} ?>
