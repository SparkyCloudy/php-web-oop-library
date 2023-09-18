<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Menu Buku</title>
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>

<div class="container pt-2 pb-2">
  <h1>Add Books</h1>
  <form action="../controller/AddBookController.php" method="post">
    <div class="form-group">
      <div class="mb-3">
        <label for="inputBookName" class="form-label">Name</label>
        <input id="inputBookName" class="form-control col-12" name="add_book_name" type="text"
               placeholder="e.g. Buku Pemrograman PHP">
      </div>

      <div class="mb-3">
        <label for="inputBookUid" class="form-label">UID</label>
        <input id="inputBookUid" class="form-control" name="add_book_uid" type="text" maxlength="9"
               placeholder="e.g. 123456789">
      </div>

      <div class="mb-2">
        <label for="inputBookQuantity" class="form-label">Quantity</label>
        <input id="inputBookQuantity" class="form-control" name="add_book_quantity" type="number"
               placeholder="e.g. 1" min="1" minlength="1">
      </div>
    </div>

    <button class="btn btn-primary btn" type="submit">Add Book</button>
  </form>

  <h1>Books List</h1>
  <table class="table mb-2">
    <tr>
      <td>Book UID</td>
      <td>Book Name</td>
      <td>Action</td>
    </tr>
    
    <?php
    
    include ('../service/Database.php');
    include ('../repository/BookRepository.php');
    
    use service\Database;
    use repository\BookRepository;
    
    $connection = new Database();
    $bookRepository = new BookRepository($connection);
    $results = $bookRepository->retriveAll();

    foreach ($results as $result) {
      ?>
      <tr>
        <td><?php
          echo $result['uid']; ?></td>
        <td><?php
          echo $result['title']; ?></td>
        <td>
          <form action="../controller/ListBookController.php" method="post">
            <div hidden>
              <label for="inputListBookId">Book Id</label>
              <input name="list_book_id" value="<?php
              echo $result['id']; ?>"
                     id="inputListBookId" type="number">
            </div>

            <button name="list_delete" type="submit" value="enable"
                    class="btn btn-danger">Delete
            </button>
            <button name="list_edit" type="submit" value="enable"
                    class="btn btn-warning">Edit
            </button>
          </form>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>

  <hr>
</div>

<div class="container pt-2 pb-2">
  <h1>Borrow Books</h1>
  <form action="" method="post">
    <div>
      <div class="mb-3">
        <label class="form-label" for="inputBorrowUserUid">User UID</label>
        <input class="form-control" id="inputBorrowUserUid" name="borrow_user_uid" type="number"
               placeholder="e.g. 123456789">
      </div>

      <div class="mb-2">
        <label class="form-label" for="inputBorrowBookUid">Book UID</label>
        <input class="form-control" id="inputBorrowBookUid" name="borrow_book_uid" type="number"
               placeholder="e.g. 123456789">
      </div>
    </div>

    <button type="submit" class="btn btn-success">Borrow</button>

  </form>
</div>

<div class="container pt-2 pb-2">
  <h1>Return Books</h1>
  <form action="" method="post">
    <div>
      <div class="mb-2">
        <label class="form-label" for="inputUserUid">User UID</label>
        <input class="form-control" id="inputUserUid" name="return_user_uid" type="number"
               placeholder="e.g. 123456789">
      </div>
    </div>

    <button type="submit" class="btn btn-success">Search</button>
  </form>

  <!--    show user books here-->

  <hr>
</div>

<div class="container pt-2 pb-2">

</div>

</body>
</html>