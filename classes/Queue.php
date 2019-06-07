<?php

class Queue
{
    /**
     * Maximum items in the queue
     * @var integer
     */

    public const MAX_ITEMS=5;
    //Queue items
    protected $items = [];


    //add an item to the end of the queue
    public function push($item)
    {
        if ($this->getCount()== static::MAX_ITEMS)
        {
            throw new QueueException("Queue is full");
        }
        $this->items[] = $item;
    }

    //take an item off the head of the queue and return the item
    public function pop()
    {
        return array_shift($this->items);
    }

    //get the total number if items in the queue
    public function getCount()
    {
        return count($this->items);
    }

    //clear the object
    public function clear()
    {
        $this->items = [];
    }
}