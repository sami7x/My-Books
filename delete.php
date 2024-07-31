<?php
$title = $_GET['title'];
$books = file('books.txt', FILE_IGNORE_NEW_LINES);
$books = array_filter($books, function ($book) use ($title) {
    return strpos($book, $title) !== 0;
});
file_put_contents('books.txt', implode("\n", $books) . "\n");
header("Location: index.php"); // Redirect to the index page after updating
exit;
