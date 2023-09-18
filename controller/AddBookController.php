<?php

include_once '../service/Database.php';
include_once '../repository/BookRepository.php';
include_once '../entity/Book.php';

use entity\Book;
use repository\BookRepository;
use service\Database;

$add_book_name = $_POST['add_book_name'];
$add_book_uid = $_POST['add_book_uid'];
$add_book_quantity = $_POST['add_book_quantity'];

if (!isset($add_book_uid, $add_book_quantity, $add_book_name)) {
  header("location: ../menu/MainMenu.php");
}

$book = new Book($add_book_name, $add_book_quantity, $add_book_uid);
$connection = new Database();
$bookRepository = new BookRepository($connection);

$bookRepository->add($book);

header("location: ../menu/MainMenu.php");