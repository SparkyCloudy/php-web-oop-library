<?php
namespace repository;

include_once 'BookRepositoryInterface.php';
include_once '../service/DatabaseInterface.php';

use entity\Book;
use mysqli;
use service\DatabaseInterface;

class BookRepository implements BookRepositoryInterface
{
  private static mysqli $database;
  
  public function __construct(DatabaseInterface $database)
  {
    self::$database = $database->getConnection();
  }
  
  function add(Book $book): bool
  {
    // TODO: Implement add() method.
    
    $title = $book->getTitle();
    $quantity = $book->getQuantity();
    $uid = $book->getUid();
    
    $stmt = self::$database->stmt_init();
    
    $stmt->prepare(
      <<<SQL
INSERT INTO table_book (title, quantity, uid) VALUES (?, ?, ?);
SQL

    );
    $stmt->bind_param("sis", $title, $quantity, $uid);
    
    $success = $stmt->execute();
    $stmt->close();
    
    return $success;
  }
  
  function remove(int $id): bool
  {
    // TODO: Implement remove() method.
    
    $stmt = self::$database->stmt_init();
    
    $stmt->prepare(
      <<<SQL
DELETE FROM table_book WHERE id=?;
SQL
    );
    $stmt->bind_param('i', $id);
    
    $success = $stmt->execute();
    $stmt->close();
    
    return $success;
  }
  
  function retriveAll(): array
  {
    // TODO: Implement retriveAll() method.
    return self::$database->query(
      <<<SQL
SELECT * FROM table_book;
SQL
    )->fetch_all(MYSQLI_ASSOC);
  }
  
  function edit(): bool
  {
    $stmt = self::$database->stmt_init();
    
    $stmt->prepare(
      <<<SQL

SQL
    );
    $stmt->bind_param();
    $success = $stmt->execute();
    
    $stmt->close();
    
    return $success;
  }
}