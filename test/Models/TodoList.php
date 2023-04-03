<?php

class TodoList
{
    private $conn;

    public function __construct($host, $username, $password, $database)
    {
        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addItem($title)
    {
        $sql = "INSERT INTO todo_list (title) VALUES ('$title')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteItem($id)
    {
        $sql = "DELETE FROM todo_list WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function markItemDone($id)
    {
        $sql = "UPDATE todo_list SET done = 1 WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function editItem($id, $new_title)
    {
        $sql = "UPDATE todo_list SET title = '$new_title' WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllItems()
    {
        $sql = "SELECT * FROM todo_list";
        $result = $this->conn->query($sql);

        $todo_items = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $todo_items[] = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'done' => $row['done']
                );
            }
        }

        return $todo_items;
    }
    public function markUndone($id) {
        $sql = "UPDATE todo_items SET is_done = 0 WHERE id = " . $id;
        $this->conn->query($sql);
    }
    
    public function getItemById($id) {
        $sql = "SELECT * FROM todo_items WHERE id = " . $id . " LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result === false) {
            echo "Error: " . $this->conn->error;
        }
        return $result->fetch_assoc();
    }
   
    
    public function closeConnection()
    {
        $this->conn->close();
    }
}