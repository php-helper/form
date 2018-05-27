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
    protected $isBindValue = false;

    public function setName($name)
    {
        $this->setAttribute(InputEnum::ATTR_NAME, $name);
        return $this;
    }

    public function getName()
    {
        return $this->getAttribute(InputEnum::ATTR_NAME);
    }

    public function setValue($value)
    {
        $this->setAttribute(InputEnum::ATTR_VALUE, $value);
        return $this;
    }

    public function getValue()
    {
        return $this->getAttribute(InputEnum::ATTR_VALUE);
    }

    public function isSkipBind(): bool
    {
        return $this->isBindValue;
    }

    public function skipBind(bool $isBindValue)
    {
        $this->isBindValue = $isBindValue;
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

    protected function bindValue(): void
    {
        if ($this->isSkipBind()) {
            return;
        }

        if (isset($this->data[$this->getName()])) {
            $this->attributes[InputEnum::ATTR_VALUE] = $this->data[$this->getName()];
        }
    }

    public function build(): string
    {
        $this->bindValue();
        return parent::build();
    }
}