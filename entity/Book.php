<?php

namespace entity;

class Book
{
  private string $title;
  private int $quantity;
  private string $uid;
  
  public function __construct(string $title, int $quantity, string $uid)
  {
    $this->title = $title;
    $this->quantity = $quantity;
    $this->uid = $uid;
  }
  
  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }
  
  /**
   * @return int
   */
  public function getQuantity(): int
  {
    return $this->quantity;
  }
  
  /**
   * @return string
   */
  public function getUid(): string
  {
    return $this->uid;
  }
  
}