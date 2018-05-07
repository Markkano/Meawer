<?php namespace Controller;

	use Daos\MeawDao as MeawDao

	class ViewKittenMeawsController extends Controller{

		private $meawDao;

		public __construct(){
			$this->meawDao = MeawDao::getInstance();

		}

		// get all the meaws ordered by creation, independent of the kittens or the timezone of them.
		public function viewAllMeaws(){
			$meawsList = $this->meawDao->selectAll();

			//require_once parent::View("viewAllMeawsCentralpage."); //calls the respective view. 
		}

	}

?>