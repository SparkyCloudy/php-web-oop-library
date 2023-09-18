<?php

namespace repository;

use entity\User;

interface UserRepositoryInterface
{
  function add(User $user): bool;
  
  function remove(int $id): bool;
  
  function find(int $id): User;
  
  function retriveAll(): array;
}