<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 12:27
 */

namespace PhpHelper\Form\Enums;

class InputEnum extends AttrEnum
{
    const TYPE_BUTTON = 'button';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_FILE = 'file';
    const TYPE_HIDDEN = 'hidden';
    const TYPE_IMAGE = 'image';
    const TYPE_PASSWORD = 'password';
    const TYPE_RADIO = 'radio';
    const TYPE_RESET = 'reset';
    const TYPE_SUBMIT = 'submit';
    const TYPE_TEXT = 'text';

    // HTML5
    const TYPE_COLOR = 'color';
    const TYPE_DATE = 'date';
    const TYPE_DATETIME = 'datetime';
    const TYPE_DATETIME_LOCAL = 'datetime-local';
    const TYPE_EMAIL = 'email';
    const TYPE_NUMBER = 'number';
    const TYPE_RANGE = 'range';
    const TYPE_SEARCH = 'search';
    const TYPE_TEL = 'tel';
    const TYPE_TIME = 'time';
    const TYPE_URL = 'url';
    const TYPE_MONTH = 'month';
    const TYPE_WEEK = 'week';

    const ATTR_TYPE = 'type';
    const ATTR_NAME = 'name';
    const ATTR_VALUE = 'value';
    const ATTR_PLACEHOLDER = 'placeholder';
    const ATTR_CHECKED = 'checked';
    const ATTR_REQUIRED = 'required';
}