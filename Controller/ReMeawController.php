<?php namespace Controller;

use Daos\KittenDAO;
use Daos\MeawDAO;
use Daos\ReMeawDAO;
use Models\Meaw;
use Models\ReMeaw;
use Models\Kitten;

class ReMeawController extends Controller{

	private $errorDevMsg;

	public function __construct(){
		parent::__construct();
		parent::CheckSession();
	}

	public function Index() {
		// Realmente no se deberia llamar este metodo
		throw new \Exception("Error Processing Request", 1);
	}

	//The id of the meaw to reMeaw. The system defines if the remeaw is already re-meawed or not.
	//As defined, only one re-meaw at a time. Remeaw another time will update the date.
	public function ReMeaw($meawId) {
    $meawId = filter_var($meawId, FILTER_SANITIZE_NUMBER_INT);
    try {
      	$kittenId = $_SESSION['kitten']->getIdKitten();
      	$originalReMeaw = ReMeawDAO::SelectByReMeaw($meawId, $kittenId);
      if(is_null($originalReMeaw)) {
      	ReMeawDAO::Insert($meawId, $kittenId);
      }else{
      	ReMeawDAO::Update($originalReMeaw);
      }
    } catch (\Exception $e) {}
   	header('location: '.BASE_URL.'ViewMeaws/Index');
	}

} ?>
