<?php

namespace App;

class IArray implements \Countable
{
    /**
     * @var array $in_items
     */
    private $in_items = [];

    /**
     * @var array $out_items ;
     */
    private $out_items = [];

    /**
     * IArray constructor.
     * @param $items
     */
    public function __construct($items)
    {
        $this->setInItems($items)->load();
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->in_items);
    }

    /**
     * @param mixed $in_items
     * @return $this
     */
    private final function setInItems($in_items)
    {
        $this->in_items = $in_items;

        return $this;
    }

    /**
     * @return mixed
     */
    private final function getInItems()
    {
        return $this->in_items;
    }

    /**
     * @return $this
     */
    private function load()
    {
        foreach ($this->in_items as $key => $in_item) {
            array_push($this->out_items, new IItem($key, $in_item));
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutItems()
    {
        $items = [];

        foreach ($this->out_items as $out_item) {
            $items[$out_item->getKey()] = $out_item->getValue();
        }

        return $items;
    }
}