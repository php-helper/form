<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 03.01.2018
 * Time: 12:09
 */

namespace PhpHelper\Form\Tags;

class RadioGroup extends BaseGroup
{
    public function __construct(string $name)
    {
        parent::__construct(Radio::class, $name);
    }
}
