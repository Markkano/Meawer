<?php namespace Controller;

use Daos\KittenDAO;
use Daos\MeawDAO;
use Daos\PurrDAO;
use Models\Meaw;
use Models\Kitten;

class PurrController extends Controller{

	private $errorDevMsg;

	public function __construct(){
		parent::__construct();
		parent::CheckSession();
	}

	public function Index() {
		// Realmente no se deberia llamar este metodo
		throw new \Exception("Error Processing Request", 1);
	}

	public function PurrMeaw($meawId, $bool) {
    $meawId = filter_var($meawId, FILTER_SANITIZE_NUMBER_INT);
    $bool = filter_var($bool, FILTER_SANITIZE_STRING);
    try {
      $kittenId = $_SESSION['kitten']->getIdKitten();
      if (strcmp($bool, 'true') == 0) {
        PurrDAO::Insert($meawId, $kittenId);
        echo json_encode(array('meawId' => $meawId, 'action' => 'purr' ,'status' => 'ok'));
      } elseif(strcmp($bool, 'false') == 0) {
        PurrDAO::Delete($meawId, $kittenId);
        echo json_encode(array('meawId' => $meawId, 'action' => 'dispurr' ,'status' => 'ok'));
      }
    } catch (\Exception $e) {
      echo json_encode(array('meawId' => $meawId, 'status' => 'error', 'error' => $e->getMessage()));
    }
	}
} ?>
