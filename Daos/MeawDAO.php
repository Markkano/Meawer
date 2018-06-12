<?php namespace Daos;

use Daos\Connection as Connection;
use Daos\KittenDAO as KittenDAO;
use Daos\ImageDAO as ImageDAO;
use Daos\CommentDAO as CommentDAO;
use Daos\PurrDAO as PurrDAO;
use Models\Meaw;
use Models\Kitten;
use Models\ReMeaw;

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
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." ORDER BY publish_date DESC");
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

  /* Returns a list with meaws and remeaws(if exists) ordered by date (meaw date, remeaw date).
   * meaw_date : the meaw date. For example, to be used on internal remeaws.
   * publish_date : the meaw and remeaw date to make the order by.
  */
  public static function SelectAllWithReMeaw() {
    try {
      $list = array();
      $stmt = Connection::Prepare("SELECT NULL as 'id_re_meawer', meaw.id_kitten as 'id_creator', meaw.content, meaw.id_meaw, meaw.image,
                                      meaw.publish_Date as 'publish_date', meaw.publish_date as 'meaw_date'
                                    FROM Meaws meaw
                                UNION
                                  SELECT reMeaw.id_kitten as 'id_re_meawer', reMeawedMeaw.id_kitten as 'id_creator',reMeawedMeaw.content,
                                      reMeawedMeaw.id_meaw, reMeawedMeaw.image, reMeaw.re_meaw_date as 'publish_date',
                                      reMeawedMeaw.publish_date as 'meaw_date'
                                    FROM Re_Meaws reMeaw
                                    INNER JOIN Meaws reMeawedMeaw ON reMeaw.id_meaw = reMeawedMeaw.id_meaw
                                  ORDER BY publish_date DESC LIMIT 10");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
          $reMeaw = NULL;
          $kitten = KittenDAO::SelectByID($result['id_creator']);
          $meaw = new Meaw(
            $kitten,
            $result['meaw_date'],
            $result['content'],
            $result['image'],
            CommentDAO::SelectAllFromMeaw($result['id_meaw']),
            PurrDAO::SelectAllFromMeaw($result['id_meaw'])
          );
          $meaw->setId($result['id_meaw']);

          if(!is_null($result['id_re_meawer'])){
            $reMeawer = KittenDAO::SelectByID($result['id_re_meawer']);
            $reMeaw = new ReMeaw($meaw, $reMeawer, $result['publish_date']);
          }

          if(!is_null($reMeaw)){
            array_push($list, $reMeaw);
          }else{
            array_push($list, $meaw);
          }
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
		 $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_meaw = ?");
     if ($stmt->execute(array($id))) {
        if($result = $stmt->fetch()){
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
          return $meaw;
        }
     }
	}

	public static function Update($object) {
		throw new \Exception("Not supported by our application yet.", 1);
	}
} ?>
