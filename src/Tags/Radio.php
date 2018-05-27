<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 12:09
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class Radio extends BaseCheckedInput
{
    public function __construct()
    {
        $this->setType(InputEnum::TYPE_RADIO);
    }
}
