<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 08.05.2018
 * Time: 19:31
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class ExtendedTag extends BaseTag implements TagInterface
{
    protected $data;
    protected $skipBind = false;

    public function setName($name)
    {
        $this->setAttribute(InputEnum::ATTR_NAME, $name);
        return $this;
    }

    public function getName()
    {
        return $this->getAttribute(InputEnum::ATTR_NAME);
    }

    public function isSkipBind(): bool
    {
        return $this->skipBind;
    }

    public function skipBind(bool $skipBind)
    {
        $this->skipBind = $skipBind;
        return $this;
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

    /**
     * @return mixed
     */
    public function getTagData()
    {
        return $this->data[$this->getName()] ?? null;
    }
}