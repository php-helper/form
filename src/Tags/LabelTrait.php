<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 09.05.2018
 * Time: 12:11
 */

namespace PhpHelper\Form\Tags;

trait LabelTrait
{
    protected $label = null;

    public function label(string $text)
    {
        if (!empty($text)) {
            $this->label = (new Label())->setText($text);
        }
        return $this;
    }

    public function getLabel(): ?Label
    {
        return $this->label;
    }
}