<?php namespace Models;

use Models\Meaw;
use Models\Kitten;

class ReMeaw {

  /// Attributes
  private $meaw;       // Meaw that is being Re-Meawed
  private $kitten;   // Kitten that is Re-Meawing
  private $reMeawDate;       // Does not need explanation

  /// Constructors
  public function __construct($meawer, $kittener, $reMeawDates){
    $this->meaw=$meawer;
    $this->kitten=$kittener;
    $this->reMeawDate=$reMeawDates;
  }
  /// Methods

  /// Getters and Setters
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

  public function getReMeawDate() {
    return $this->reMeawDate;
  }

  public function setReMeawDate($value) {
    $this->reMeawDate = $value;
  }
} ?>
