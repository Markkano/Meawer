<?php namespace Models;

	

class Meaw {
  
	private $idMeaw;      	//int
	private $kitten;    	//Kitten object
	private $image;     	//name of the image
	private $publishDate; 	//datetime
	private $content;		//varchar(280);
	private $comments;		//Comment object Array
	
	public function __construct($Kitten, $imageName, $publishDate, $content, $comments){
		$this->kitten = $Kitten;
		$this->image = $ImageName;
		$this->publishDate = $publishDate;
		$this->content = $content;
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
	
	public function getImageName(){
		return $this->image;
	}
	public function setImageName($imageName){
		$this->image = $imageName;
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

	public function getComments(){
		return $this->comment;
	}

	public function addComment($comment){
		//TODO : implementation
	}

	public function deleteComment($comment){
		//TODO : implementation
	}
	
} ?>