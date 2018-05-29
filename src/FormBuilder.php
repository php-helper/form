<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 05.05.2018
 * Time: 10:34
 */

namespace PhpHelper\Form;

use ArrayAccess;
use PhpHelper\Form\Tags\BaseTag;
use PhpHelper\Form\Enums\ButtonEnum;
use PhpHelper\Form\Enums\FormEnum;
use PhpHelper\Form\Enums\InputEnum;
use PhpHelper\Form\Tags\Button;
use PhpHelper\Form\Tags\Checkbox;
use PhpHelper\Form\Tags\FormClose;
use PhpHelper\Form\Tags\FormOpen;
use PhpHelper\Form\Tags\Input;
use PhpHelper\Form\Tags\Label;
use PhpHelper\Form\Tags\Radio;
use PhpHelper\Form\Tags\RadioGroup;
use PhpHelper\Form\Tags\TagInterface;
use PhpHelper\Form\Tags\TextArea;
use Zend\Diactoros\ServerRequest;

class FormBuilder implements ArrayAccess
{
    const FORM_OPEN_KEY = 'open';
    const FORM_CLOSE_KEY = 'close';

    /** @var mixed[] */
    protected $tags;
    /** @var mixed[] */
    protected $data = [];

    /**
     * @param mixed $data
     */
    public function __construct($data = [])
    {
        if ($data instanceof ServerRequest) {
            $this->data = $data->getParsedBody();
        } else {
            $this->data = $data;
        }
    }

    public function getData()
    {
        return $this->data;
    }

    private function addInputTypeTag(string $name, string $inputType, string $labelText = ''): Input
    {
        $object = new Input();
        $object->setName($name)
            ->setType($inputType)
            ->setData($this->data)
            ->label($labelText);
        $this->storeTag($name, $object);

        return $object;
    }

    protected function storeTag(string $name, TagInterface $object)
    {
        $this->tags[$name] = $object;
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->tags[$offset]);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->tags[$offset] ?? null;
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->tags[$offset] = $value;
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->tags[$offset]);
    }

    public function __toString()
    {
        return $this->build();
    }

    public function build()
    {
        $tags = '';
        foreach ($this->tags as $tag) {
            /** @var BaseTag $tag */
            $tags .= $tag->build();
        }

        return $tags;
    }

    public function open($method = FormEnum::METHOD_POST): FormOpen
    {
        $object = new FormOpen();
        $object->setMethod($method);
        $this->storeTag(self::FORM_OPEN_KEY, $object);

        return $object;
    }

    public function close(): FormClose
    {
        $object = new FormClose();
        $this->storeTag(self::FORM_CLOSE_KEY, $object);

        return $object;
    }

    public function input(string $name, string $labelText = ''): Input
    {
        return $this->addInputTypeTag($name, InputEnum::TYPE_TEXT, $labelText);
    }

    public function checkbox(string $name, string $labelText = ''): Checkbox
    {
        $object = new Checkbox();
        $object->setData($this->data)->setName($name)->label($labelText);
        $this->storeTag($name, $object);

        return $object;
    }

    public function radio(string $name, string $labelText = ''): Radio
    {
        $object = new Radio();
        $object->setData($this->data)->setName($name)->label($labelText);
        $this->storeTag($name, $object);

        return $object;
    }

    public function radioGroup(string $name, string $labelText = ''): RadioGroup
    {
        $object = new RadioGroup();
        $object->setData($this->data)->setName($name)->label($labelText);
        $this->storeTag($name, $object);

        return $object;
    }

    public function email(string $name, string $labelText = ''): Input
    {
        return $this->addInputTypeTag($name, InputEnum::TYPE_EMAIL, $labelText);
    }

    public function password(string $name): Input
    {
        return $this->addInputTypeTag($name, InputEnum::TYPE_PASSWORD);
    }

    public function submit(string $text = 'Submit'): Button
    {
        $object = new Button();
        $object->setType(ButtonEnum::TYPE_SUBMIT)->setText($text);
        $this->storeTag(ButtonEnum::TYPE_SUBMIT, $object);

        return $object;
    }

    public function textArea(string $name): TextArea
    {
        $object = new TextArea();
        $object->setData($this->data)->setName($name);
        $this->storeTag($name, $object);

        return $object;
    }

    public function label(string $name, string $text, string $for = ''): Label
    {
        $object = new Label();
        $object->setText($text);
        if ($for) {
            $object->setFor($for);
        }
        $this->storeTag($name, $object);

        return $object;
    }

    public function select(string $name): Select
    {
        $object = new Select();
        $object->setName($name)
            ->setData($this->getData());
        $this->storeTag($name, $object);

        return $object;
    }

    public function button(string $name): Button
    {
        $object = new Button();
        $object->setName($name)
            ->setData($this->getData());
        $this->storeTag($name, $object);

        return $object;
    }
}
