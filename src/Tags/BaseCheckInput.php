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
        return $this;
    }

    public function getValue()
    {
        return $this->getAttribute(InputEnum::ATTR_VALUE);
    }

    public function setChecked(bool $checked)
    {
        if (!empty($this->getData())) {
            return $this;
        }
        $this->setCheckedAttribute($checked);

        return $this;
    }

    public function getChecked()
    {
        return $this->getAttribute(InputEnum::ATTR_CHECKED);
    }

    protected function bindValue(): void
    {
        if ($this->getValue() === '' && !is_null($this->defaultValue)) {
            $this->attributes[InputEnum::ATTR_VALUE] = $this->defaultValue;
        }

        if ($this->isSkipBind()) {
            return;
        }

        if (!is_null($tagData = $this->getTagData())) {
            if (is_array($tagData)) {
                $this->setCheckedAttribute(in_array($this->getValue(), $tagData));
            } else {
                $this->setCheckedAttribute($tagData == $this->getValue());
            }
        }
    }

    private function setCheckedAttribute(bool $checked)
    {
        if ($checked) {
            $this->setAttribute(InputEnum::ATTR_CHECKED, InputEnum::ATTR_CHECKED);
        } else {
            $this->removeAttribute(InputEnum::ATTR_CHECKED);
        }

        return $this;
    }
}
