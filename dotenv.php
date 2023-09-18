<?php

namespace DotEnv;

class DotEnv
{
  public static function init(): void
  {
    putenv("DB_HOST=localhost");
    putenv("DB_USER=prajna");
    putenv("DB_PASS=");
    putenv("DB_NAME=tugas_1");
  }
}