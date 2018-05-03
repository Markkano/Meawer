<?php namespace Models;

class ReMeaw {

  /// Attributes
  private Meaw $meaw;       // Meaw that is being Re-Meawed
  private Kitten $kitten;   // Kitten that is Re-Meawing
  private reMeawDate;       // Does not need explanation

  /// Constructors

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
