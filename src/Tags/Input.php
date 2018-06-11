<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 12:14
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;
use PhpHelper\Validator\Validator;

class Input extends ExtendedTag implements TagInterface
{
    use LabelTrait;

    protected $tagName = 'input';
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
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

    public function setType($type)
    {
        $this->setAttribute(InputEnum::ATTR_TYPE, $type);
        return $this;
    }

    public function getType()
    {
        return $this->getAttribute(InputEnum::ATTR_TYPE);
    }

    public function setRequired(bool $required)
    {
        $this->setAttribute(InputEnum::ATTR_REQUIRED, $required);
        return $this;
    }

    public function getRequired()
    {
        return $this->getAttribute(InputEnum::ATTR_REQUIRED);
    }

    public function setPlaceholder($placeholder)
    {
        $this->setAttribute(InputEnum::ATTR_PLACEHOLDER, $placeholder);
        return $this;
    }

    public function getPlaceholder()
    {
        return $this->getAttribute(InputEnum::ATTR_PLACEHOLDER);
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

    public function addRule()
    {
        return $this->validator->addRule($this->getName());
    }
}