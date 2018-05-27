<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 05.05.2018
 * Time: 10:34
 */

namespace PhpExt\Form;

use PhpExt\Form\Enums\ButtonEnum;
use PhpExt\Form\Enums\FormEnum;
use PhpExt\Form\Enums\InputEnum;
use PhpExt\Form\Tags\Button;
use PhpExt\Form\Tags\Checkbox;
use PhpExt\Form\Tags\FormClose;
use PhpExt\Form\Tags\FormOpen;
use PhpExt\Form\Tags\Input;
use PhpExt\Form\Tags\Label;
use PhpExt\Form\Tags\Radio;
use PhpExt\Form\Tags\RadioGroup;
use PhpExt\Form\Tags\TextArea;
use Zend\Diactoros\ServerRequest;

class FormComponents
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

    public function open($method = FormEnum::METHOD_POST): FormOpen
    {
        $object = new FormOpen();
        $object->setMethod($method);
        $this->tags[self::FORM_OPEN_KEY] = $object;

        return $object;
    }

    public function close(): FormClose
    {
        $object = new FormClose();
        $this->tags[self::FORM_CLOSE_KEY] = $object;

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
        $this->tags[$name] = $object;

        return $object;
    }

    public function radio(string $name, string $labelText = ''): Radio
    {
        $object = new Radio();
        $object->setData($this->data)->setName($name)->label($labelText);
        $this->tags[$name] = $object;

        return $object;
    }

    public function radioGroup(string $name, string $labelText = ''): RadioGroup
    {
        $object = new RadioGroup();
        $object->setData($this->data)->setName($name)->label($labelText);
        $this->tags[$name] = $object;

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
        $this->tags[ButtonEnum::TYPE_SUBMIT] = $object;

        return $object;
    }

    public function textArea(string $name): TextArea
    {
        $object = new TextArea();
        $object->setData($this->data)->setName($name);
        $this->tags[$name] = $object;

        return $object;
    }

    public function label(string $name, string $text, string $for = ''): Label
    {
        $object = new Label();
        $object->setText($text);
        if ($for) {
            $object->setFor($for);
        }
        $this->tags[$name] = $object;

        return $object;
    }

    private function addInputTypeTag(string $name, string $inputType, string $labelText = ''): Input
    {
        $object = new Input();
        $object->setName($name)
            ->setType($inputType)
            ->setData($this->data)
            ->label($labelText);
        $this->tags[$name] = $object;

        return $object;
    }
}