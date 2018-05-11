<?php namespace Controller;

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
} ?>
