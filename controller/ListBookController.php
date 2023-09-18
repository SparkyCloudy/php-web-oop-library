<?php
namespace controller;

include_once '../service/Database.php';
include_once '../repository/BookRepository.php';

use repository\BookRepository;
use service\Database;

$delete = isset($_POST['list_delete']);
$edit = isset($_POST['list_edit']);
$book_id = $_POST['list_book_id'];

if (!isset($book_id)) {
  header("location: ../menu/MainMenu.php");
}

$connection = new Database();
$bookRepository = new BookRepository($connection);

if ($delete) {
  $bookRepository->remove($book_id);
  unset($delete);
}

if ($edit) {
  $bookRepository->edit();
  unset($edit);
}

header("location: ../menu/MainMenu.php");