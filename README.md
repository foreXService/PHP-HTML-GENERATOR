# PHP HTML GENERATOR
Create HTML tags in php code .

## Create 

```php
$div = new new TagGenerator()->setTagName('div');
```
or

```php
$div = new new TagGenerator(['tagName'=>'div']);
```

## Render

```php
new TagGenerator([
        'tagName'=>'div',
        'echoHtml'=>true
    ]);
```
or
```php
echo $div;
```
or
```php
$div->echoHtml();
```

result

```html
<div></div>
```

## Atributes
### One attribute
```php
new TagGenerator([
        'tagName'=>'div',
        'echoHtml'=>true,
        'atributes'=>[
            'class'=>'myClassName'
        ]
    ]);
```
or
```php
$div->setAtribute('class','myClassName');
```
or
```php
$div->setClass('myClassName');
```
result

```html
<div class="myClassName"></div>
```
### More attributes
```php
new TagGenerator([
        'tagName'=>'div',
        'echoHtml'=>true,
        'atributes'=>[
            'class'=>'myClassName',
            'id'=>'myId',
            'onclick'='myFunction()'
        ]
    ]);
```
or
```php
$div->setAtribute('class','myClassName')
    ->setAtribute('id','myId')
    ->setAtribute('onclick','myFunction()');
```
or
```php
$div->setAtributes([
        'class'=>'myClassName',
        'id'=>'myId',
        'onclick'='myFunction()'
    ]);
```
or
```php
$div->setClass('myClassName')
    ->setId('myId')
    ->setOnclick('myFunction()');
```
result

```html
<div class="myClassName" id="myId" onclick="myFunction()"></div>
```