<?php

use PHPUnit\Framework\TestCase;
use HtmlTagGenerator\TagGenerator;

class HtmlTagGeneratorTest  extends TestCase
{
    public function testTagConstruct()
    {
        $div = new TagGenerator(['tagName'=>'input']);
        $this->assertEquals($div, '<input>');
    }

    public function testTagBuilder()
    {
        $div = (new TagGenerator())
            ->setTagName('input');
        $this->assertEquals($div, '<input>');
    }
    
}
