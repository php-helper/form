<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 28.05.2018
 * Time: 10:03
 */

namespace PhpHelper\Form;

interface FormInterface
{
    public function createFormBuilder($data = []): FormBuilderInterface;
}