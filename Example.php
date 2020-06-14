<?php

require_once './vendor/autoload.php';
use HtmlTagGenerator\TagGenerator;

$div =new TagGenerator([
    'tagName'=>'div'
]);

$div->addChildren([
    'Hello !!!',
    new TagGenerator(['tagName'=>'p']),
    new TagGenerator(['tagName'=>'p']),
    new TagGenerator(['tagName'=>'p'])
]);

$div->echoHtml();