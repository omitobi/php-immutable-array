<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 30/07/2018
 * Time: 22:15
 */

namespace App;


class IArray implements \Countable
{
    /**
     * @var array $in_items
     */
    private $in_items;
    /**
     * @var array $out_items;
     */
    private $out_items;

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
        return array_map(function (IItem $out_item) {
            return $out_item->toString();
        }, $this->out_items);
    }

}