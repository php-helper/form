<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 09.05.2018
 * Time: 11:52
 */

namespace PhpHelper\Form\Tags;

trait TextTrait
{
    /** @var string */
    private $text;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }
}