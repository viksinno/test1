<?php

require_once 'models/TodoList.php';
require_once 'views/header.php';
require_once 'views/footer.php';


class TodoController{

    private $todo_list;

    public function __construct() {
        $this->todo_list = new TodoList("localhost","vikas","Vikas123@","Todo_list");
    }

    public function index() {
        $todo_items = $this->todo_list->getAllItems();
        require 'views/list.php';
    }

    public function add() {
        if (isset($_POST['add'])) {
            $title = trim($_POST['title']);
            if (!empty($title)) {
                $this->todo_list->addItem($title);
            }
            header("Location: index.php", true, 303);
            exit;
        }
        require 'views/add.php';
    }

    public function edit() {
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $new_title = trim($_POST['new_title']);
            if (!empty($new_title)) {
                $this->todo_list->editItem($id, $new_title);
            } else {
                echo "New title is empty";
            }
            header("Location: index.php", true, 303);
            exit;
        }
        $id = $_GET['id'];
        $todo_item = $this->todo_list->getItemById($id);
        if ($todo_item === false) {
            echo "Error: item not found";
        }
        require 'views/edit.php';
    }

    public function delete() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $this->todo_list->deleteItem($id);
            header("Location: index.php", true, 303);
            exit;
        }
        $id = $_GET['id'];
        $todo_item = $this->todo_list->getItemById($id);
        require 'views/delete.php';
    }

    public function mark_done() {
        if (isset($_POST['mark_done'])) {
            $id = $_POST['id'];
            $this->todo_list->markItemDone($id);
        }
    }
        public function mark_undone() {
            if (isset($_POST['mark_undone'])) {
                $id = $_POST['id'];
                $this->todo_list->markUndone($id);
                header("Location: index.php", true, 303);
                exit;
            }
            $id = $_GET['id'];
            $todo_item = $this->todo_list->getItemById($id);
            require 'views/mark_undone.php';
        }
        
        public function error() {
            require 'views/error.php';
        }
    }
  
?>