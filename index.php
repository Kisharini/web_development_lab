<?php
include 'connection.php';

// Insert or Update
if (isset($_POST['save'])) {
    $id = $_POST['book_id'] ?? null;
    $title = $_POST['book_title'];
    $author = $_POST['author_name'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];
	$quantity = $_POST['quantity'];

    $cover = $_FILES['book_cover']['name'];
    $tmp_name = $_FILES['book_cover']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $cover);

    if ($id) {
        $conn->query("UPDATE library SET book_title='$title', author_name='$author', book_cover=$cover, genre='$genre', publication_year='$publication_year', quantity='$quantity' WHERE book_id=$id");
    } else {
        $conn->query("INSERT INTO library (book_title, author_name, book_cover, genre, publication_year, quantity) VALUES ('$title', '$author', '$cover', '$genre', '$publication_year', '$quantity')");
    }
    header("Location: index.php");
    exit();
}


// Fetch all books
$result = $conn->query("SELECT * FROM library");


// Get book for edit (if any)
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editData = $conn->query("SELECT * FROM library WHERE book_id=$id")->fetch_assoc();
}

// Fetch book for view
if (isset($_GET['view'])) {
    $viewId = intval($_GET['view']);
    $viewBook = $conn->query("SELECT * FROM library WHERE book_id=$viewId")->fetch_assoc();
    include 'views/book.php';
    exit();
}


// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM library WHERE book_id=$id");
    header("Location: index.php");
    exit();
}

include 'views/header.php';
include 'views/book_form.php';
include 'views/book_table.php';

?>
