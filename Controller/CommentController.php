<?php namespace Controller;

use Daos\KittenDAO;
use Daos\MeawDAO;
use Daos\CommentDAO;
use Models\Meaw;
use Models\Kitten;
use Models\Comment as Comment;

class CommentController extends Controller{

	public function __construct(){
		parent::__construct();
		parent::CheckSession();
	}

	public function Index() {
		// Realmente no se deberia llamar este metodo
		throw new \Exception("Error Processing Request", 1);
	}

	public function CommentMeaw($meawId, $comment) {
	    $meawId = filter_var($meawId, FILTER_SANITIZE_NUMBER_INT);
	    $comment = filter_var($comment, FILTER_SANITIZE_STRING);
	    try {
	   	  $date = date('Y-m-d H:i:s');
	      $kittenId = $_SESSION['kitten']->getIdKitten();
	      $myComment = new Comment($kittenId, $date, $comment);
	      CommentDAO::InsertComment($myComment, $meawId);
	      echo json_encode(array('meawId' => $meawId, 'comment' => $comment ,'status' => 'ok'));
	    } catch (\Exception $e) {
	      echo json_encode(array('meawId' => $meawId, 'status' => 'error', 'error' => $e->getMessage()));
	    }
	}
} ?>
