<div class="table">
    <?php

    $books = file("books.txt", FILE_IGNORE_NEW_LINES);
    ?>

    <h1>My Book List</h1>

    <table border="1">
        <tr>
            <th>
                Title
            </th>
            <th>
                Author
            </th>
            <th>
                Genre
            </th>
            <th>
                Status
            </th>
            <th colspan="2">
                Action
            </th>
        </tr>

        <?php foreach ($books as $book) : ?>
            <?php list($title, $author, $genre, $status) = explode(",", $book); ?>
            <tr>
                <td>
                    <?php echo htmlspecialchars($title); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($author); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($genre); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($status); ?>
                </td>
                <td>
                    <a href="edit.php?title=<?php echo urlencode($title); ?>"> Edit </a>
                </td>
                <td>
                    <a href="delete.php?title=<?php echo urlencode($title); ?>"> Delete </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>