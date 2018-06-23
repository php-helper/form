<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 23.06.2018
 * Time: 15:31
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Enums\InputEnum;

class Group extends BaseGroup
{
    public function __construct()
    {
        parent::__construct(InputEnum::TYPE_CHECKBOX);
    }
}
