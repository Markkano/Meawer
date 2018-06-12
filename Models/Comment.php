<?php namespace Models;

use Models\Meaw;
use Models\Kitten;

class Comment {

  /// Attributes
  private $idComment;       // Id
  private $meaw;       // Meaw that is being Commented
  private $kitten;   // Kitten that is Commenting
  private $commentDate;     // Date of the Comment
  private $content;         // Text of the Comment

  /// Constructors
  public function __construct( $kitten, $commentDate, $content) {
    $this->kitten = $kitten;
    $this->commentDate = $commentDate;
    $this->content = $content;
  }

  /// Methods

  /// Getters and Setters
  public function getId() {
    return $this->idComment;
  }

  public function setId($value) {
    $this->idComment = $value;
  }

  public function getKitten() {
    return $this->kitten;
  }

  public function setKitten(Kitten $value) {
    $this->kitten = $value;
  }

  public function getCommentDate() {
    return $this->commentDate;
  }

  public function setCommentDate($value) {
    $this->commentDate = $value;
  }

  public function getContent() {
    return $this->content;
  }

  public function setContent($value) {
    $this->content = $value;
  }
} ?>
