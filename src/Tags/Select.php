<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 28.05.2018
 * Time: 9:45
 */

namespace PhpHelper\Form\Tags;

use PhpHelper\Form\Tags\ExtendedTag;
use PhpHelper\Form\Tags\LabelTrait;
use PhpHelper\Form\Tags\TagInterface;

class Select extends ExtendedTag implements TagInterface
{
    use LabelTrait;

    protected $tagName = 'select';
    protected $optionsArray = [];
    protected $options = '';
    protected $disabledItems = [];

    /**
     * @return mixed[]
     */
    public function getOptionsArray(): array
    {
        return $this->optionsArray;
    }

    /**
     * @param mixed[] $optionsArray
     * @return Select
     */
    public function setOptionsArray(array $optionsArray): Select
    {
        // TODO: allow set up raw options as string
        $this->optionsArray = $optionsArray;
        return $this;
    }

    /**
     * @return array
     */
    public function getDisabledItems(): array
    {
        return $this->disabledItems;
    }

    /**
     * @param array $disabledItems
     */
    public function setDisabledItems(array $disabledItems): Select
    {
        $this->disabledItems = $disabledItems;
        return $this;
    }

    public function build(): string
    {
        $this->options = '';
            $this->optionsArrayToString($this->optionsArray);
        return sprintf(
            '<%s%s>%s</%s>',
            $this->tagName,
            $this->attributesToString(),
            $this->options,
            $this->tagName
        );
    }

    private function optionsArrayToString(array $optionsArray)
    {
        foreach ($optionsArray as $value => $option) {
            if (is_array($option)) {
                $this->options .= sprintf('<optgroup label="%s">', $value);
                $this->optionsArrayToString($option);
                $this->options .= '</optgroup>';
            } else {
                $tagData = $this->getTagData();
                $selected = '';
                $disabled = '';
                if (!$this->isSkipBind() && !is_null($tagData) && $tagData == $value) {
                    $selected = ' selected';
                }
                if (in_array($value, $this->disabledItems)) {
                    $disabled = ' disabled';
                }
                $this->options .= sprintf(
                    '<option%s%s value="%s">%s</option>',
                    $selected,
                    $disabled,
                    $value,
                    $option
                );
            }
        }
    }
}