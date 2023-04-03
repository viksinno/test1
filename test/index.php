<?php

// Include the model
require_once 'models/TodoList.php';
require_once './controller/TodoController.php';

// Initialize the todo list
$todo_list = new TodoList("localhost","vikas","Vikas123@","Todo_list");

// Check if an action parameter is set, otherwise set it to "list"
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Handle the actions
switch ($action) {
    case 'list':
        // Get the todo items from the model
        $todo_items = $todo_list->getItemById($id);
        
        // Include the view
        require 'views/list.php';
        break;
    case 'add':
        // Check if the form has been submitted
        if (isset($_POST['title'])) {
            // Add the new todo item to the model
            $title = $_POST['title'];
            $todo_list->addItem($title);
            
            // Redirect to the list view
            header('Location: index.php');
            exit();
        }
        
        // Include the view
        require 'views/add.php';
        break;
    case 'edit':
        // Check if the form has been submitted
        if (isset($_POST['id']) && isset($_POST['title'])) {
            // Update the todo item in the model
            $id = $_POST['id'];
            $title = $_POST['title'];
            $todo_list->editItem($id, $title);
            
            // Redirect to the list view
            header('Location: index.php');
            exit();
        }
        
        // Get the todo item to be edited from the model
        $id = $_GET['id'];
        $todo_item = $todo_list->getItemById($id);
        
        // Include the view
        require 'views/edit.php';
        break;
    case 'delete':
        // Check if the form has been submitted
        if (isset($_POST['id'])) {
            // Delete the todo item from the model
            $id = $_POST['id'];
            $todo_list->deleteItem($id);
            
            // Redirect to the list view
            header('Location: index.php');
            exit();
        }
        
        // Get the todo item to be deleted from the model
        $id = $_GET['id'];
        $todo_item = $todo_list->getItemById($id);
        
        // Include the view
        require 'views/delete.php';
        break;
    default:
        // Redirect to the list view
        header('Location: index.php');
        exit();
}

?>


