<?php namespace Daos;

<<<<<<< HEAD
use Daos\MeawDAO;
use Daos\KittenDAO;
use Models\Comment;

class CommentDAO extends SingletonDAO implements IDAO {
=======
use Daos\Connection as Connection;
use Daos\MeawDAO as MeawDAO;
use Daos\KittenDAO as KittenDAO;
use Models\Comment as Comment;

abstract class CommentDAO implements IDAO {
>>>>>>> 0b81080c2ffa87353ab0bfad724deaa13220de3b

  private $pdo;
  private static $table = 'Comments';

  public static function SelectByID($id) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_comment = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          $comment = new Comment(
            MeawDAO::SelectByID($result['id_meaw']),
            KittenDAO::SelectByID($result['id_kitten']),
            $result['comment_date'],
            $result['content']
          );
          $comment->setId($result['id_comment']);
          return $comment;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectAllFromMeaw($id_meaw) {
    try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_meaw = ?");
      if ($stmt->execute(array($id_meaw))) {
        while ($result = $stmt->fetch()) {
          $comment = new Comment(
            MeawDAO::SelectByID($result['id_meaw']),
            KittenDAO::SelectByID($result['id_kitten']),
            $result['comment_date'],
            $result['content']
          );
          $comment->setId($result['id_comment']);
          array_push($list, $comment);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectAll() {
    try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table."");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
          $comment = new Comment(
            MeawDAO::SelectByID($result['id_meaw']),
            KittenDAO::SelectByID($result['id_kitten']),
            $result['comment_date'],
            $result['content']
          );
          $comment->setId($result['id_comment']);
          array_push($list, $comment);
        }
        return $list;
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

  public static function Update($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }
} ?>
