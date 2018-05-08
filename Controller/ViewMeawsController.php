<?php namespace Controller;

class ViewMeawsController extends Controller {

  public function Index() {
    Debug($_SESSION['kitten']);
  }
} ?>
