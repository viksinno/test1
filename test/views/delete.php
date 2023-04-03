<?php
    require 'header.php';
?>

<h1>Delete Item</h1>

<p>Are you sure you want to delete this item?</p>

<form method="post" action="index.php?action=delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" name="delete" value="yes">Yes</button>
    <a href="index.php">No</a>
</form>

<?php
    require 'footer.php';
?>
