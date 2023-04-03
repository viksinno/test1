<?php require 'header.php'; ?>

<h1>Add Todo Item</h1>

<form method="POST" action="?action=add">
  <div>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" />
  </div>

  <button type="submit">Add Item</button>
</form>

<?php require 'footer.php'; ?>
