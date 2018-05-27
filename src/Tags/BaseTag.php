<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 11:22
 */

namespace PhpExt\Form\Tags;

use PhpExt\Form\Enums\AttrEnum;

class BaseTag implements TagInterface
{
    /** @var string */
    protected $tagName;
    protected $attributes = [];
    protected $singleAttributes = [
        AttrEnum::ATTR_HIDDEN,
    ];

    public function getTagName()
    {
        return $this->tagName;
    }

    public function getAccesskey(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_ACCESSKEY);
    }

    public function setAccesskey(string $accesskey)
    {
        $this->setAttribute(AttrEnum::ATTR_ACCESSKEY, $accesskey);
        return $this;
    }

    public function getClass(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_CLASS);
    }

    public function setClass(string $class)
    {
        $this->setAttribute(AttrEnum::ATTR_CLASS, $class);
        return $this;
    }

    public function addClass(string $class)
    {
        $this->addMassProperty(AttrEnum::ATTR_CLASS, $class);
        return $this;
    }

    public function getContentEditable(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_CONTENTEDITABLE);
    }

    public function setContentEditable(string $contentEditable)
    {
        $this->setAttribute(AttrEnum::ATTR_CONTENTEDITABLE, $contentEditable);
        return $this;
    }

    public function getContextmenu(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_CONTEXTMENU);
    }

    public function setContextmenu(string $contextmenu)
    {
        $this->setAttribute(AttrEnum::ATTR_CONTEXTMENU, $contextmenu);
        return $this;
    }

    public function getDir(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_DIR);
    }

    public function setDir(string $dir): string
    {
        $this->setAttribute(AttrEnum::ATTR_DIR, $dir);
        return $this;
    }

    public function getHidden(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_HIDDEN);
    }

    public function setHidden(bool $hidden = true)
    {
        $this->setAttribute(AttrEnum::ATTR_HIDDEN, $hidden);
        return $this;
    }

    public function getId(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_ID);
    }

    public function setId(string $id)
    {
        $this->setAttribute(AttrEnum::ATTR_ID, $id);
        return $this;
    }

    public function getLang(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_LANG);
    }

    public function setLang(string $lang)
    {
        $this->setAttribute(AttrEnum::ATTR_LANG, $lang);
        return $this;
    }

    public function getSpellcheck(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_SPELLCHECK);
    }

    public function setSpellcheck(string $spellcheck)
    {
        $this->setAttribute(AttrEnum::ATTR_SPELLCHECK, $spellcheck);
        return $this;
    }

    public function getStyle(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_STYLE);
    }

    public function setStyle(string $style)
    {
        $this->setAttribute(AttrEnum::ATTR_STYLE, $style);
        return $this;
    }

    public function getTabindex(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_TABINDEX);
    }

    public function setTabindex(string $tabindex)
    {
        $this->setAttribute(AttrEnum::ATTR_TABINDEX, $tabindex);
        return $this;
    }

    public function getTitle(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_TITLE);
    }

    public function setTitle(string $title)
    {
        $this->setAttribute(AttrEnum::ATTR_TITLE, $title);
        return $this;
    }

    public function getXmlLang(): string
    {
        return $this->getAttribute(AttrEnum::ATTR_XMLLANG);
    }

    public function setXmlLang(string $xmlLang)
    {
        $this->setAttribute(AttrEnum::ATTR_XMLLANG, $xmlLang);
        return $this;
    }

    /**
     * @param string $attrName
     * @param mixed $attrValue
     * @return $this
     */
    protected function setAttribute($attrName, $attrValue)
    {
        $this->attributes[$attrName] = $attrValue;
        return $this;
    }

    protected function removeAttribute(string $attributeName)
    {
        unset($this->attributes[$attributeName]);
        return $this;
    }

    protected function getAttribute(string $attributeName, $defaultValue = '')
    {
        return $this->attributes[$attributeName] ?? $defaultValue;
    }

    protected function addMassProperty(string $propertyName, string $propertyValue)
    {
        $property = $this->getAttribute($propertyName);
        if (!empty($property)) {
            $propertyArray = explode(' ', $property);
            if (!in_array($propertyValue, $propertyArray)) {
                if (count($propertyArray) > 0) {
                    $propertyArray[] = $propertyValue;
                    $property = implode(' ', $propertyArray);
                } else {
                    $property = $propertyValue;
                }
                $this->setAttribute($propertyName, $property);
            }
        } else {
            $this->setAttribute($propertyName, $propertyValue);
        }

        return $this;
    }

    protected function getSingleAttributes()
    {
        return $this->singleAttributes;
    }

    protected function attributesToString()
    {
        $attributes = '';
        foreach ($this->attributes as $name => $value) {
            if (in_array($name, $this->getSingleAttributes())) {
                if ($value) {
                    $attributes .= sprintf(' %s', $name);
                }
            } else {
                $attributes .= sprintf(' %s="%s"', $name, $value);
            }
        }

        return $attributes;
    }

    public function build(): string
    {
        return sprintf('<%s%s>', $this->tagName, $this->attributesToString());
    }

    public function __toString(): string
    {
        return $this->build();
    }
}