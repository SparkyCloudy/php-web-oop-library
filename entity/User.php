<?php

namespace entity;

class User
{
  private int $id;
  private string $name;
  private string $password;
  private string $username;
  private string $role;
  private string $uid;
  
  protected function __constructor(int $id, string $name, string $password, string $username, string $role,
                                   string $uid): void
  {
    $this->id = $id;
    $this->name = $name;
    $this->password = $password;
    $this->username = $username;
    $this->role = $role;
    $this->uid = $uid;
  }
  
  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }
  
  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }
  
  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }
  
  /**
   * @return string
   */
  public function getUsername(): string
  {
    return $this->username;
  }
  
  /**
   * @return string
   */
  public function getRole(): string
  {
    return $this->role;
  }
  
  /**
   * @return string
   */
  public function getUid(): string
  {
    return $this->uid;
  }
}