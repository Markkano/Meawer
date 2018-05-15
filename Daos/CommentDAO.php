<?php namespace Daos;
use Daos\MeawDAO;
use Daos\KittenDAO;
use Models\Comment;

class CommentDAO extends SingletonDAO implements IDAO {

  private $pdo;
  private $meawDAO;
  private $kittenDAO;

  private $table = 'Comments';

  public function __construct() {
    $this->pdo = Connection::getInstance();
    $this->meawDAO = MeawDAO::getInstance();
    $this->kittenDAO = KittenDAO::getInstance();
  }

  public function SelectByID($id) {
    try {
      $stmt = $this->pdo->Prepare("SELECT * FROM ".$this->table." WHERE id_comment = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          $comment = new Comment(
            $this->meawDAO->SelectByID($result['id_meaw']),
            $this->kittenDAO->SelectByID($result['id_kitten']),
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

  public function SelectAll() {
    try {
      $list = array();
      $stmt = $this->pdo->Prepare("SELECT * FROM ".$this->table."");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
          $comment = new Comment(
            $this->meawDAO->SelectByID($result['id_meaw']),
            $this->kittenDAO->SelectByID($result['id_kitten']),
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

  public function Insert($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public function Delete($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public function Update($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }
} ?>
