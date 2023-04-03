<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <div>
        <a href="add.php">Add Item</a>
    </div>

    <?php if (empty($todos)): ?>
        <p>No items in the list.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($todos as $todo): ?>
                <li>
                    <?php if ($todo['done']): ?>
                        <s><?= $todo['title'] ?></s>
                    <?php else: ?>
                        <?= $todo['title'] ?>
                    <?php endif; ?>
                    <form method="post" action="markdone.php">
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button type="submit">Mark as Done</button>
                    </form>
                    <form method="post" action="edit.php">
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <form method="post" action="delete.php">
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
