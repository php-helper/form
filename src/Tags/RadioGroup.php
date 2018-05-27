<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 12:09
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class RadioGroup extends Input
{
    private $radios = [];

    public function __construct()
    {
        $this->setType(InputEnum::TYPE_RADIO);
    }

    public function addRadio()
    {
        $object = new Radio();
        $object->setName($this->getName());
        $this->radios[] = $object;

        return $object;
    }

    public function build(): string
    {
        $html = '';
        foreach ($this->radios as $radio) {
            /** @var Radio $radio */
            $html .= '//TODO: radio';
        }

        return $html;
    }
}
