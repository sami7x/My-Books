<div class="search">
    <?php
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $books = file('books.txt', FILE_IGNORE_NEW_LINES);
    if ($search) {
        $books = array_filter($books, function ($book) use ($search) {
            return strpos($book, $search) !== false;
        });
    }
    ?>

    <form method="get" action="index.php">
        <input type="text" name="search" placeholder="Search books..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Search">
    </form>
</div>