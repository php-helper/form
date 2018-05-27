<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 17.12.2017
 * Time: 14:11
 */

namespace PhpExt\Form\Tags;

use PhpExt\Form\Enums\FormEnum;

class FormOpen extends BaseTag implements TagInterface
{
    protected $tagName = 'form';

    public function setAction(string $action): FormOpen
    {
        $this->setAttribute(FormEnum::ATTR_ACTION, $action);
        return $this;
    }

    public function getAction()
    {
        return $this->getAttribute(FormEnum::ATTR_ACTION);
    }

    public function setAutocomplete(bool $autocomplete)
    {
        $this->setAttribute(
            FormEnum::ATTR_AUTOCOMPLETE,
            $autocomplete ? FormEnum::ATTR_AUTOCOMPLETE_ON : FormEnum::ATTR_AUTOCOMPLETE_OFF
        );
        return $this;
    }

    public function getAutocomplete()
    {
        return $this->getAttribute(FormEnum::ATTR_ACTION);
    }

    public function setEnctype(string $method)
    {
        $this->setAttribute(FormEnum::ATTR_ENCTYPE, $method);
        return $this;
    }

    public function getEnctype()
    {
        return $this->getAttribute(FormEnum::ATTR_ENCTYPE);
    }

    public function setEnctypeMultipart()
    {
        $this->setEnctype(FormEnum::ENCTYPE_MULTIPART);
        return $this;
    }

    public function setEnctypeUrlEncoded()
    {
        $this->setEnctype(FormEnum::ENCTYPE_URLENCODED);
        return $this;
    }

    public function setEnctypeText()
    {
        $this->setEnctype(FormEnum::ENCTYPE_TEXT);
        return $this;
    }

    public function setMethod(string $method)
    {
        $this->setAttribute(FormEnum::ATTR_METHOD, $method);
        return $this;
    }

    public function getMethod()
    {
        return $this->getAttribute(FormEnum::ATTR_METHOD);
    }
}
