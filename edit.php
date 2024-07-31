<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldTitle = $_POST["old_title"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $status = $_POST["status"];

    $books = file("books.txt", FILE_IGNORE_NEW_LINES);

    // Initialize a flag to check if the book was found and updated
    $bookFound = false;

    foreach ($books as &$book) {
        list($bookTitle) = explode(',', $book);
        if ($bookTitle == $oldTitle) {
            $book = "$title,$author,$genre,$status"; // Update the book details
            $bookFound = true;
            break; // Exit the loop once the book is found and updated
        }
    }

    if ($bookFound) {
        file_put_contents('books.txt', implode("\n", $books) . "\n");
        header("Location: index.php"); // Redirect to the index page after updating
        exit;
    } else {
        echo "Error: Book not found.";
    }
} else {
    $title = $_GET['title'];
    $books = file('books.txt', FILE_IGNORE_NEW_LINES);
    foreach ($books as $book) {
        list($bookTitle, $author, $genre, $status) = explode(',', $book);
        if ($bookTitle == $title) break;
    }
}
?>

<form method="POST" action="edit.php">
    <input type="hidden" name="old_title" value="<?php echo htmlspecialchars($title); ?>">
    Title: <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
    Author: <input type="text" name="author" value="<?php echo htmlspecialchars($author); ?>" required>
    Genre: <input type="text" name="genre" value="<?php echo htmlspecialchars($genre); ?>" required>
    Status:
    <select name="status">
        <option value="read" <?php if ($status == 'Read') echo 'selected'; ?>>Read</option>
        <option value="unread" <?php if ($status == 'Unread') echo 'selected'; ?>>Unread</option>
        <option value="reading" <?php if ($status == 'Reading') echo 'selected'; ?>>Reading</option>
    </select>
    <input type="submit" value="Update">
</form>