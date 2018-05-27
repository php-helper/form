<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 05.05.2018
 * Time: 10:34
 */

namespace PhpHelper\Form;

class Form
{
    /**
     * @param mixed $data
     * @return FormBuilder
     */
    public function createFormBuilder($data = []): FormBuilder
    {
        $formBuilder = new FormBuilder($data);

        return $formBuilder;
    }
}
