<?php

namespace service;

use mysqli;

interface DatabaseInterface
{
  public function getConnection(): mysqli;
}