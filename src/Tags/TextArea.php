<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 17.12.2017
 * Time: 15:40
 */

namespace PhpExt\Form\Tags;

use PhpExt\Form\Enums\TextAreaEnum;

class TextArea extends ExtendedTag
{
    use TextTrait;
    use LabelTrait;

    protected $tagName = 'textarea';

    public function setName($name)
    {
        $this->setAttribute(TextAreaEnum::ATTR_NAME, $name);
        return $this;
    }

    public function getName()
    {
        return $this->getAttribute(TextAreaEnum::ATTR_NAME);
    }

    public function build(): string
    {
        return sprintf('<%s%s>%s</%s>', $this->tagName, $this->attributesToString(), $this->text, $this->tagName);
    }
}
