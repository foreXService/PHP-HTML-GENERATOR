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

    public function testClassConstruct()
    {
        $div = new TagGenerator([
            'tagName'=>'input',
            'attributes'=>[
                'class'=>'myClass'
            ]
        ]);
        $this->assertEquals($div, '<input class="myClass">');
    }

    public function testClassBuilder()
    {
        $div = (new TagGenerator())
            ->setTagName('input')
            ->setClass('myClass');
        $this->assertEquals($div, '<input class="myClass">');
    }

    public function testClassAttributeBuilder()
    {
        $div = (new TagGenerator())
            ->setTagName('input')
            ->setAttribute('class','myClass');
        $this->assertEquals($div, '<input class="myClass">');
    }

    public function testChildrenConstruct()
    {
        $div = new TagGenerator([
            'tagName'=>'div',
            'children'=>[
                new TagGenerator([
                    'tagName'=>'p',
                    'children'=>[
                        'test'
                    ]
                ])
            ]
        ]);
        $this->assertEquals($div, '<div><p>test</p></div>');
    }

    public function testChildrenBuilder()
    {
        $div = (new TagGenerator())
            ->setTagName('div')
            ->addChild(
                (new TagGenerator())
                    ->setTagName('p')
                    ->addChild('test')
            );
        $this->assertEquals($div, '<div><p>test</p></div>');
    }
    
}
