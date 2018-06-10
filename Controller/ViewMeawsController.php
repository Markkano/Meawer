<?php namespace Controller;
use Daos\KittenDAO;
use Daos\MeawDAO;
use Models\Kitten;
use Models\Meaw;

class ViewMeawsController extends Controller {

  public function __construct() {
    parent::__construct();
    parent::CheckSession();
  }

  public function ViewAllMeaws() {
    try {
      // Traigo la lista de Meaws
      $meawsList = MeawDAO::SelectAll();
      //Debug($meawsList);
    } catch (\PDOException $e) {
      Debug($e);
      $error = "Ocurrio un problema al traer la lista de Meaws. Por favor reintente mas tarde";
    }
    //Debug($meawsList);
    // Llamo a la vista
    include_once parent::View("ViewMeaws");
  }

  public function Index() {
    // Es la funcion de la Controladora, debe mostrar los Meaws
    $this->ViewAllMeaws();
  }
} ?>
