<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 12:36
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class BaseCheckedInput extends Input
{
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

        $this->setChecked(isset($this->data[$this->getName()]));
    }
}
