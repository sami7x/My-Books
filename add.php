<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $status = $_POST["status"];

    $book = "$title, $author, $genre, $status\n";
    file_put_contents("books.txt", $book, FILE_APPEND);
    header("Location: index.php"); //redirects to this page after submitting
    exit;
}
?>

<form method="POST">
    Title: <input type="text" name="title" required></input>
    Author: <input type="text" name="author" required></input>
    Genre: <input type="text" name="genre" required></input>
    Status:
    <select name="status">
        <option value="read">Read</option>
        <option value="unread">Unread</option>
        <option value="reading">Reading</option>
    </select>
    <input type="Submit">
</form>