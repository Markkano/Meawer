<?php namespace DAOS;

interface IDAO {
	

  
  /* Should insert the object, get the ID, assign it to the object
   * and return the object with the ID assigned.
   */
  public function Insert($object);

  public function Delete($object);
  
  public function SelectByID($id);
  
  public function SelectAll();
  
  public function Update($object);
} ?>