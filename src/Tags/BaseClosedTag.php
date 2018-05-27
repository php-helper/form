<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 11:50
 */

namespace PhpExt\Form\Tags;

class BaseClosedTag implements TagInterface
{
    /** @var string */
    protected $tagName;

    public function getTagName()
    {
        return $this->tagName;
    }

    public function build(): string
    {
        return sprintf('</%s>', $this->getTagName());
    }

    public function __toString(): string
    {
        return $this->build();
    }
}