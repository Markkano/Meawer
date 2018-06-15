<?php namespace Models;

class Meaw {

	private $idMeaw;      		// int
	private $kitten;    			// Kitten object
	private $image;   				// Name of the image
	private $publishDate; 		// Datetime
	private $content;					// Varchar(280);
	private $comments;				// Comment object Array
	private $purrs = array(); // Array with kittens

	public function __construct($Kitten, $publishDate, $content,  $image, $comments, $purrs){
		$this->kitten = $Kitten;
		$this->publishDate = $publishDate;
		$this->content = $content;
		$this->image = $image;
		$this->comments = $comments;
		$this->purrs = $purrs;
	}

	public function getId(){
		return $this->idMeaw;
	}

	public function setId($idMeaw){
		$this->idMeaw = $idMeaw;
	}

	public function getKitten(){
		return $this->kitten;
	}

	public function setKitten($kitten){
		$this->kitten = $kitten;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

	public function getPublishDate(){
		return $this->publishDate;
	}

	public function setPublishDate($publishDate){
		$this->publishDate = $publishDate;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function setComments($comments){
		$this->comment = $comments;
	}

	public function getComments(){
		return $this->comments;
	}

	public function getPurrs() {
		return $this->purrs;
	}

	public function setPurrs($purrs) {
		$this->purrs = $purrs;
	}
} ?>
