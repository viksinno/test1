<!DOCTYPE html>
<html>

<head>
    <title>Todo App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <?php
            // Start session
            require_once "Todo.php";
            session_start();

            // Check if TodoList object exists in session
            if (!isset($_SESSION["todo_list"])) {
                $_SESSION["todo_list"] = new TodoList();
            }

            $todo_list = $_SESSION["todo_list"];

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    $title = $_POST["title"];
                    $todo_list->addItem($title);
                } else if (isset($_POST["delete"])) {
                    $id = $_POST["id"];
                    $todo_list->deleteItem($id);
                } else if (isset($_POST["mark_done"])) {
                    $id = $_POST["id"];
                    $todo_list->markDone($id);
                } else if (isset($_POST["mark_undone"])) {
                    $id = $_POST["id"];
                    $todo_list->markUndone($id);
                }
            }

            ?>
            <h1>Todo App</h1>
            <!--  form to fill user details and submission-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="title">Add item:</label>
                <input class="input" type="text" name="title" id="title" required>
                <button class="btn" type="submit" name="add">Add</button>
            </form>

            <h2>Todo List:</h2>

            <ol>
                <?php foreach ($todo_list->getItems() as $item) : ?>
                    <li <?php if ($item->isDone()) : ?>class="done" <?php endif; ?>>
                        <?php echo $item->getTitle(); ?>
                        <!-- form for todo list -->
                        <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="id" value="<?php echo $item->getId(); ?>">
                            <?php if (!$item->isDone()) : ?>
                                <button class="btn" type="submit" name="mark_done">Mark Done</button>
                            <?php else : ?>
                                <button class="btn" type="submit" name="mark_undone">Mark Undone</button>
                            <?php endif; ?>
                            <button class="btn" type="submit" name="delete">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</body>

</html>