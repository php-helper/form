<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 09.05.2018
 * Time: 11:33
 */

namespace PhpHelper\Form\Tags;

interface TagInterface
{
    public function build(): string;

    public function __toString(): string;
}