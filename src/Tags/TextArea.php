<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 17.12.2017
 * Time: 15:40
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\TextAreaEnum;

class TextArea extends ExtendedTag
{
    use TextTrait;
    use LabelTrait;

    protected $tagName = 'textarea';
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->bindValue();
    }

    public function setName($name)
    {
        $this->setAttribute(TextAreaEnum::ATTR_NAME, $name);
        return $this;
    }

    public function getName()
    {
        return $this->getAttribute(TextAreaEnum::ATTR_NAME);
    }

    protected function bindValue(): void
    {
        if ($this->isSkipBind()) {
            return;
        }

        if (isset($this->data[$this->getName()])) {
            $this->setText($this->data[$this->getName()]);
        }
    }

    public function build(): string
    {
        return sprintf(
            '<%s%s>%s</%s>',
            $this->tagName,
            $this->attributesToString(),
            $this->getText(),
            $this->tagName
        );
    }

    public function addRule()
    {
        return $this->validator->addRule($this->getName());
    }
}
