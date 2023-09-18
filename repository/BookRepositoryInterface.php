<?php

namespace repository;

use entity\Book;

interface BookRepositoryInterface
{
  function add(Book $book): bool;
  
  function remove(int $id): bool;
  
  function retriveAll(): array;
  
  function edit(): bool;
}