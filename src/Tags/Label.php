<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 18.12.2017
 * Time: 21:35
 */

namespace PhpExt\Form\Tags;

use PhpExt\Form\Enums\LabelEnum;

class Label extends BaseTag implements TagInterface
{
    protected $tagName = 'label';

    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Label
     */
    public function setText(string $text): Label
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getFor(): string
    {
        return $this->getAttribute(LabelEnum::ATTR_FOR);
    }

    /**
     * @param string $for
     * @return Label
     */
    public function setFor(string $for): Label
    {
        $this->attributes[LabelEnum::ATTR_FOR] = $for;

        return $this;
    }

    public function build(): string
    {
        return sprintf('<%s%s>%s</%s>', $this->tagName, $this->attributesToString(), $this->text, $this->tagName);
    }
}
