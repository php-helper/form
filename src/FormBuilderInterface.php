<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 23.06.2018
 * Time: 14:39
 */

namespace PhpHelper\Form;

interface FormBuilderInterface
{
    public function __toString(): string;

    public function build(): string;
}