<?php namespace Models;

class Comment {

  /// Attributes
  private $idComment;       // Id
  private Meaw $meaw;       // Meaw that is being Commented
  private Kitten $kitten;   // Kitten that is Commenting
  private $commentDate;     // Date of the Comment
  private $content;         // Text of the Comment

  /// Constructors

  /// Methods

  /// Getters and Setters
  public function getId() {
    return $this->idComment;
  }

  public function setId($value) {
    $this->idComment = $value;
  }

  public function getMeaw() {
    return $this->meaw;
  }

  public function setMeaw(Meaw $value) {
    $this->meaw = $value;
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
