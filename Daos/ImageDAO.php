<?php namespace Daos;

use Daos\Connection as Connection;

abstract class ImageDAO implements IDAO {


  public static function SelectByID($id) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM Images WHERE id_image = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          return $result['path'];
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectIdByPath($path) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM Images WHERE path = ?  LIMIT 1");
      if ($stmt->execute(array($path))) {
        if ($result = $stmt->fetch()) {
          return $result['id_image'];
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function Insert($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}

  public static function Delete($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}

  public static function SelectAll() {
		throw new \Exception("Not supported by our application yet.", 1);
	}

  public static function Update($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}
} ?>
