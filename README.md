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
        'atribute'=>[
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
        'atribute'=>[
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
<div class="myClassName" id="myId" onclick="myFunction()"></div>
```