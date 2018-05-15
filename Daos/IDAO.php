<?php namespace DAOS;

interface IDAO {

  public static function Insert($object);

  public static function Delete($object);

  public static function SelectByID($id);

  public static function SelectAll();

  public static function Update($object);
} ?>
