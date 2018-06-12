<?php namespace DAOS;

abstract class Connection {

  private static $pdo = null;
  public static function PDO() {
    if (is_null(self::$pdo)) {
      self::$pdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
      self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    return self::$pdo;
  }

  public static function Prepare($sql) {
    return self::PDO()->prepare($sql);
  }

  public static function LastInsertId() {
    return self::PDO()->lastInsertId();
  }

  public static function ErrorInfo() {
    return self::PDO()->errorInfo();
  }
} ?>
