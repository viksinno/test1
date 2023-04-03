<?php require 'header.php'; ?>

<h1>Edit Todo Item</h1>

<form method="post" action="index.php?action=update">
    <input type="hidden" name="id" value="<?= $todo_item['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?= $todo_item['title'] ?>">
    <button type="submit" name="update">Update</button>
</form>

<?php require 'footer.php'; ?>
