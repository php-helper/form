<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 12:14
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class Input extends ExtendedTag implements TagInterface
{
    use LabelTrait;

    protected $tagName = 'input';

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
}