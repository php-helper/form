<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 23.06.2018
 * Time: 15:29
 */

namespace PhpHelper\Form\Tags;

class BaseGroup implements TagInterface
{
    use LabelTrait;

    private $data;
    private $name;
    private $itemClass;
    private $items = [];

    public function __construct(string $itemClass, string $name)
    {
        $this->itemClass = $itemClass;
        $this->name = $name;
    }

    /**
     * @param mixed[] $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function addItem()
    {
        /** @var BaseCheckInput $object */
        $object = new $this->itemClass();
        $object->setData($this->getData());
        $object->setName($this->name);
        $this->items[] = $object;

        return $object;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function build(): string
    {
        $html = '';
        foreach ($this->items as $radio) {
            /** @var Radio $radio */
            $html .= $radio->build();
        }
        return $html;
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
