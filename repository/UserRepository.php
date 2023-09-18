<?php

namespace repository;

use entity\User;
use mysqli;
use service\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
  private static mysqli $connection;
  
  // TODO: Implement database parameter
  public function __construct(DatabaseInterface $db)
  {
    self::$connection = $db->getConnection();
  }
  
  function add(User $user): bool
  {
    // TODO: Implement add() method.
    
    $name = $user->getName();
    $password = $user->getPassword();
    $username = $user->getUsername();
    $role = $user->getRole();
    $uid = $user->getUid();
    
    $stmt = self::$connection->stmt_init();
    
    $stmt->prepare(
      <<<SQL
INSERT INTO table_user (name, password, username, role, uid) VALUES (?, ?, ?, ?, ?);
SQL

    );
    $stmt->bind_param("sssss", $name, $password, $username, $role, $uid);
    
    $success = $stmt->execute();
    $stmt->close();
    
    return $success;
  }
  
  function remove(int $id): bool
  {
    // TODO: Implement remove() method if success return TRUE.
    
    $stmt = self::$connection->stmt_init();
    
    $stmt->prepare(
      <<<SQL
DELETE FROM table_user WHERE id=?;
SQL
    
    );
    $stmt->bind_param("i", $id);
    
    $success = $stmt->execute();
    $stmt->close();
    
    return $success;
  }
  
  function find(int $id): User
  {
    // TODO: Implement find() method.
  }
  
  function retriveAll(): array
  {
    // TODO: Implement retriveAll() method.
  }
}