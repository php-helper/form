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
    protected $defaultValue = null;
    protected $isSettedData = false;
    protected $data = null;
    protected $skipBind = false;

    public function setDefaultValue($value)
    {
        $this->defaultValue = $value;
        return $this;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

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
        $name = str_replace(['[', ']'], ['', ''], $this->getName());
        return $this->data[$name] ?? null;
    }

    protected function bindValue(): void
    {
        if (!is_null($this->defaultValue)) {
            $this->attributes[InputEnum::ATTR_VALUE] = $this->defaultValue;
        }

        if ($this->isSkipBind()) {
            return;
        }

        if (!is_null($tagData = $this->getTagData())) {
            $this->attributes[InputEnum::ATTR_VALUE] = $tagData;
        }
    }

    public function build(): string
    {
        $this->bindValue();
        return parent::build();
    }
}