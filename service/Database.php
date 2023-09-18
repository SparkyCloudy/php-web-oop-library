<?php

namespace service;

include_once 'DatabaseInterface.php';
include_once '../dotenv.php';

use DotEnv\DotEnv;
use mysqli;

class Database implements  DatabaseInterface
{
  private static string $db_host, $db_user, $db_pass, $db_name;
  private static mysqli $connection;
  
  public function __construct()
  {
    DotEnv::init();
    self::$db_host = getenv("DB_HOST", true);
    self::$db_user = getenv("DB_USER", true);
    self::$db_pass = getenv("DB_PASS", true);
    self::$db_name = getenv("DB_NAME", true);
  }
  
  public function getConnection(): mysqli
  {
    // TODO: Implement getConnection() method.
    self::$connection = mysqli_connect(
      self::$db_host,
      self::$db_user,
      self::$db_pass,
      self::$db_name
    );
    
    if (mysqli_connect_errno() > 0 || !isset(self::$db_host, self::$db_user, self::$db_pass, self::$db_name)) {
      exit("Koneksi ke database gagal: " . mysqli_error(self::$connection));
    }
    
    return self::$connection;
  }
}