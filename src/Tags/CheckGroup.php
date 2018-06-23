<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 23.06.2018
 * Time: 15:41
 */

namespace PhpHelper\Form\Tags;

class CheckGroup extends BaseGroup
{
    public function __construct(string $name)
    {
        parent::__construct(Checkbox::class, $name);
    }
}
