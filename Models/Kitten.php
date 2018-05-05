<?php namespace Models;

class Kitten {

  /// Attributes
  private $idKitten;          // Id
  private $username;          // Meawer account username
  private $email;             // Meawer account Email
  private $password;          // Meawer account Password
  private $name;              // Real name
  private $surname;           // Real surname
  private $bornDate;          // Does not need explanation :v
  private $registerDate;      // Meawer register date
  private $image;             // Path to Profile image (can be null)
  private $backgroungImage;   // Path to Profile background image (can be null)

  /// Constructors
  public function __construct($idKitten, $username, $name, $surname){
      $this->idKitten = $idKitten;
      $this->username = $username;
      $this->name = $name;
      $this->surname = $surname;
  }

  /// Methods

  /// Getters and Setters
  public function getIdKitten() {
    return $this->idKitten;
  }

  public function setIdKitten($value) {
    $this->idKitten = $value;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($value) {
    $this->username = $value;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($value) {
    $this->email = $value;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($value) {
    $this->password = $value;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($value) {
    $this->name = $value;
  }

  public function getSurname() {
    return $this->surname;
  }

  public function setSurname($value) {
    $this->surname = $value;
  }

  public function getRegisterDate() {
    return $this->registerDate;
  }

  public function setRegisterDate($value) {
    $this->registerDate = $value;
  }

  public function getBornDate() {
    return $this->bornDate;
  }

  public function setBornDate($value) {
    $this->bornDate = $value;
  }

  public function getImage() {
    return $this->Image;
  }

  public function setImage($value) {
    $this->Image = $value;
  }

  public function getBackgroundImage() {
    return $this->backgroundImage;
  }

  public function setBackgroundImage($value) {
    $this->backgroundImage = $value;
  }
} ?>
