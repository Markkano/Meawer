<?php namespace Daos;

use Daos\Connection as Connection;
use Daos\KittenDAO as KittenDAO;
use Daos\ImageDAO as ImageDAO;
use Daos\CommentDAO as CommentDAO;
use Daos\PurrDAO as PurrDAO;
use Models\Meaw;

abstract class MeawDao implements Idao {

	private static $table = "Meaws"; //Name of the table.

	public static function Insert($object) {
		try {
      $stmt = Connection::Prepare("INSERT INTO ".self::$table." (id_kitten, image, publish_date, content) VALUES (?,?,?,?)");
      $stmt->execute(array(
        $object->getKitten()->getIdKitten(),
        $object->getImage(),
        $object->getPublishDate(),
        $object->getContent()
      ));
      $object->setId(Connection::LastInsertId());
      return $object;
    } catch (\PDOException $e) {
      throw $e;
    }
	}

	public static function SelectAll() {
		try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." ORDER BY publish_date DESC LIMIT 10");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
					$kitten = KittenDAO::SelectByID($result['id_kitten']);
          $meaw = new Meaw(
						$kitten,
						$result['publish_date'],
            $result['content'],
            $result['image'],
						CommentDAO::SelectAllFromMeaw($result['id_meaw']),
						PurrDAO::SelectAllFromMeaw($result['id_meaw'])
          );
          $meaw->setId($result['id_meaw']);
          array_push($list, $meaw);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
	}

	public static function SelectAllFromKitten($id_kitten) {
		try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_kitten = ?");
      if ($stmt->execute(array($id_kitten))) {
        while ($result = $stmt->fetch()) {
					$kitten = KittenDAO::SelectByID($result['id_kitten']);
          $meaw = new Meaw(
						$kitten,
						$result['publish_date'],
            $result['content'],
            $result['image'],
						CommentDAO::SelectAllFromMeaw($result['id_meaw']),
						PurrDAO::SelectAllFromMeaw($result['id_meaw'])
          );
          $meaw->setId($result['id_meaw']);
          array_push($list, $meaw);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
	}

	public static function Delete($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}

	public static function SelectByID($id) {
		try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_meaw = ?");
      if ($stmt->execute(array($id))) {
        while ($result = $stmt->fetch()) {
					$kitten = KittenDAO::SelectByID($result['id_kitten']);
          $meaw = new Meaw(
						$kitten,
						$result['publish_date'],
            $result['content'],
            $result['image'],
						CommentDAO::SelectAllFromMeaw($result['id_meaw']),
						PurrDAO::SelectAllFromMeaw($result['id_meaw'])
          );
          $meaw->setId($result['id_meaw']);
          array_push($list, $meaw);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
	}

	public static function Update($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}
} ?>
