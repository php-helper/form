<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 06.05.2018
 * Time: 11:39
 */

namespace PhpExt\Form\Enums;

class FormEnum extends AttrEnum
{
    const ATTR_ACTION = 'action';
    const ATTR_AUTOCOMPLETE = 'autocomplete';
    const ATTR_AUTOCOMPLETE_ON = 'on';
    const ATTR_AUTOCOMPLETE_OFF = 'off';
    const ATTR_ENCTYPE = 'enctype';
    const ATTR_METHOD = 'method';

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    const ENCTYPE_URLENCODED = 'application/x-www-form-urlencoded';
    const ENCTYPE_MULTIPART = 'multipart/form-data';
    const ENCTYPE_TEXT =  'text/plain';

}