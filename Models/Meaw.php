<?php namespace Models;



class Meaw {

	private $idMeaw;      //int
	private $kitten;    	//Kitten object
	private $image;   //name of the image
	private $publishDate; //datetime
	private $content;			//varchar(280);
	private $comments;		//Comment object Array

	public function __construct($Kitten, $publishDate, $content,  $image, $comments){
		$this->kitten = $Kitten;
		$this->publishDate = $publishDate;
		$this->content = $content;
		$this->image = $image;
		$this->comments = $comments;
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

	public function addComment($comment){
		//TODO : implementation
	}

	public function deleteComment($comment){
		//TODO : implementation
	}
} ?>
