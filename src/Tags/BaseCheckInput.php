<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 12:36
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class BaseCheckInput extends Input
{
    public function setValue($value)
    {
        $this->setAttribute(InputEnum::ATTR_VALUE, $value);
        $this->bindValue();
        return $this;
    }

    public function getValue()
    {
        return $this->getAttribute(InputEnum::ATTR_VALUE);
    }

    public function setChecked(bool $checked)
    {
        if ($checked) {
            $this->setAttribute(InputEnum::ATTR_CHECKED, InputEnum::ATTR_CHECKED);
        } else {
            $this->removeAttribute(InputEnum::ATTR_CHECKED);
        }

        return $this;
    }

    public function getChecked()
    {
        return $this->getAttribute(InputEnum::ATTR_CHECKED);
    }

    protected function bindValue(): void
    {
        if ($this->isSkipBind()) {
            return;
        }

        $tagData = $this->getTagData();
        if (is_array($tagData)) {
            $this->setChecked(in_array($this->getValue(), $tagData));
        } else {
            $this->setChecked($tagData == $this->getValue());
        }
    }
}
