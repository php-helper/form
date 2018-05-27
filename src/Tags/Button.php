<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 14:45
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\ButtonEnum;

class Button extends ExtendedTag
{
    use TextTrait;

    protected $tagName = 'button';

    public function setType($type)
    {
        $this->setAttribute(ButtonEnum::ATTR_TYPE, $type);

        return $this;
    }

    public function getType()
    {
        return $this->getAttribute(ButtonEnum::ATTR_TYPE);
    }

    public function build(): string
    {
        return sprintf('<%s%s>%s</%s>', $this->tagName, $this->attributesToString(), $this->text, $this->tagName);
    }
}
