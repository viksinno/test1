<?php

class TodoItem
{
    private $id;
    private $title;
    private $done;

    public function __construct($id, $title, $done)
    {
        $this->id = $id;
        $this->title = $title;
        $this->done = $done;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isDone()
    {
        return $this->done;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function markDone()
    {
        $this->done = true;
    }

    public function markUndone()
    {
        $this->done = false;
    }
}


class TodoList
{
    private $items;

    public function __construct()
    {
        $this->items = array();
    }

    public function addItem($title)
    {
        $id = count($this->items) + 1;
        $item = new TodoItem($id, $title, false);
        array_push($this->items, $item);
    }

    public function deleteItem($id)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getId() == $id) {
                unset($this->items[$key]);
                break;
            }
        }
    }

    public function markDone($id)
    {
        foreach ($this->items as $item) {
            if ($item->getId() == $id) {
                $item->markDone();
                break;
            }
        }
    }

    public function markUndone($id)
    {
        foreach ($this->items as $item) {
            if ($item->getId() == $id) {
                $item->markUndone();
                break;
            }
        }
    }

    public function getItems()
    {
        return $this->items;
    }
    public function editItem($id, $new_title) {
        $item = $this->items[$id];
        $item->setTitle($new_title);
    }
}
?>  
