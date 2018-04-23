<?php namespace Controller;

class LoginController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function Index() {
    parent::View("Index","Login");
    //parent::View("Login");
    //parent::View();
  }

  public function Login() {
    parent::View();
  }
} ?>
