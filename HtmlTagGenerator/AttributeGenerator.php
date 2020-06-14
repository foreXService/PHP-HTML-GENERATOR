<?php
declare(strict_types=1);
namespace HtmlTagGenerator;

class AttributeGenerator
{
    public function __call(string $method,array $arguments)
    {
        if (!$this->isSetMethod($method)) return $this;

        $name = $this->atributeGenerator($method);
        $value = $this->argumentValidation($arguments);
        $this->setAttribute($name,$value);

        return $this;
    }
    
    private function atributeGenerator(string $method):string
    {
        $leters = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        if (strpos($method,'set',0) === 0) 
        {
            $method = substr($method,3);
        }

        foreach ($leters as $leter) 
        {
            $method = str_replace($leter,'-' . strtolower($leter),$method);
        }

        if (strpos($method,'-',0) === 0)  
        {
            $method = substr($method,1);
        }

        return $method;
    }

    private function isSetMethod(string $method):bool
    {
        if (strpos($method,'set',0) === 0 ) return true;
        echo ("<br>method ${method} not found !<br>");
        return false;
    }

    private function argumentValidation(array $arguments):string
    {
        if (empty($arguments)) $arguments[0] = '!~true~!';
        if ($arguments[0] === true ) $arguments[0] = '!~true~!';
        if ($arguments[0] === false) $arguments[0] = '!~false~!';
        return $arguments[0];
    }
}