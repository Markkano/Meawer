<?php namespace DAOS;

interface IDAO {
	

  
  /* Should insert the object, get the ID, assign it to the object
   * and return the object with the ID assigned.
   */
  public function insert($object);

  public function delete($object);
  
  public function selectByID($id);
  
  public function selectAll();
  
  public function update($object);
} ?>