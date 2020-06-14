<?php
declare(strict_types=1);
namespace HtmlTagGenerator;
use HtmlTagGenerator\AttributeGenerator;

class TagGenerator extends AttributeGenerator
{
    private $tagName = 'div';
    private $autoClose = false;
    private $attributes = [];
    private $children = [];
   
    public function __construct(array $arguments = [])
    {
        $this->constructorSetArguments($arguments);
        if (!empty($arguments['echoHtml'])) $this->echoHtml();
    }

    public function __toString()
    {
        return $this->generateHtml();
    }

    public function setTagName(string $tagName):self
    {
        $this->tagName = $tagName;
        $this->autoClose = $this->checkAutoClose();
        return $this;
    }

    public function setAttribute(string $name,string $value):self
    {
        if ($name == 'text')
        {
            $this->addChild($value);
        }
        else
        {
            $this->attributes[$name] = $value;
        }
        return $this;
    }

    public function setAttributes(array $attributes):self
    {
        foreach ($attributes as $name => $value) 
        {  
            $this->setAttribute($name,$value);
        }
        return $this;
    }

    public function setAutoClose(bool $autoClose):self
    {
        $this->autoClose = $autoClose;
        return $this;
    }

    public function addChild(string $child):self
    {
        array_push($this->children,$child);
        return $this;
    }

    public function addChildren(array $children):self
    {
        $this->children = array_merge($this->children,$children);
        return $this;
    }

    public function echoHtml():self
    {
        $html = $this->generateHtml();
        echo $html;
        return $this;
    }

    public function generateHtml():string
    {
        $html = '<' . $this->tagName;

        foreach ($this->attributes as $attribute => $value) 
        {
            if ($value != '')
            {
                if ($value === '!~true~!') 
                {
                    $html .= ' ' . $attribute ;
                } 
                else if ($value === '!~false~!') 
                {
                    continue;
                } 
                else if ($attribute == 'text')
                {
                    $this->addChild($value);
                }
                else
                {
                    $html .= ' ' . $attribute . '="' . $value . '"';
                }
            }
            
        }
        $html .=  '>';
        
        if (!$this->autoClose)
        {
            foreach ($this->children as $child) 
            {
                    $html .=  $child;
            }
            $html .=  '</' . $this->tagName . '>';
        }
        
        return $html;
    }

    private function checkAutoClose():bool
    {
        switch ($this->tagName) 
        {
            case 'area':
            case 'base':
            case 'br':
            case 'col':
            case 'embed':
            case 'hr':
            case 'img':
            case 'input':
            case 'link':
            case 'meta':
            case 'param':
            case 'source':
            case 'track':
                return true;
                break;
            
            default:
                return false;
                break;
        }
    }

    private function constructorSetArguments(array $arguments = [])
    {
        $this->tagName = $arguments['tagName'] ?? 'div';
        $this->autoClose = $arguments['autoClose'] ?? $this->checkAutoClose();
        $this->attributes = $arguments['attributes'] ?? [];
        // $this->attributes[] = $arguments['attribute'] ?? null;
        $this->children = $arguments['children'] ?? [];
        // $this->children[] = $arguments['child'] ?? null;
    }
}
