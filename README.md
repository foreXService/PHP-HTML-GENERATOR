# PHP HTML GENERATOR
Create HTML tags in php code .

## Create 

```php
$div = (new TagGenerator())->setTagName('div');
```
or

```php
$div = new TagGenerator(['tagName'=>'div']);
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

## Attributes
* One attribute
```php
new TagGenerator([
        'tagName'=>'div',
        'attributes'=>[
            'class'=>'myClassName'
        ]
    ]);
```
or
```php
$div->setAttribute('class','myClassName');
```
or
```php
$div->setClass('myClassName');
```
result

```html
<div class="myClassName"></div>
```
* More attributes
```php
new TagGenerator([
        'tagName'=>'div',
        'attributes'=>[
            'class'=>'myClassName',
            'id'=>'myId',
            'onclick'=>'myFunction()'
        ]
    ]);
```
or
```php
$div->setAttribute('class','myClassName')
    ->setAttribute('id','myId')
    ->setAttribute('onclick','myFunction()');
```
or
```php
$div->setAttributes([
        'class'=>'myClassName',
        'id'=>'myId',
        'onclick'=>'myFunction()'
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
<div id="myId" class="myClassName" onclick="myFunction()"></div>
```




### Structured
* Add one element
```php
new TagGenerator([
        'tagName'=>'div',
        'children'=>[
            new TagGenerator(['tagName'=>'p'])
        ]
    ]);
```
or
```php
$div->addChild(new TagGenerator(['tagName'=>'p']));
```
or
```php
$div->addChildren([
    new TagGenerator(['tagName'=>'p'])
]);
```
result

```html
<div>
    <p></p>
</div>
```
* Add more elements
```php
new TagGenerator([
        'tagName'=>'div',
        'children'=>[
            'Hello !!!',
            new TagGenerator(['tagName'=>'p']),
            new TagGenerator(['tagName'=>'p']),
            new TagGenerator(['tagName'=>'p'])
        ]
    ]);
```
or
```php
$div->addChild('Hello !!!')
    ->addChild(new TagGenerator(['tagName'=>'p']))
    ->addChild(new TagGenerator(['tagName'=>'p']))
    ->addChild(new TagGenerator(['tagName'=>'p']));
```
or
```php
$div->addChildren([
    'Hello !!!',
    new TagGenerator(['tagName'=>'p']),
    new TagGenerator(['tagName'=>'p']),
    new TagGenerator(['tagName'=>'p'])
]);
```
result

```html
<div>
    Hello !!!
    <p></p>
    <p></p>
    <p></p>
</div>
```

### How to generate attributes
```php
setAttributeName('value')
```
result
```html
attribute-name="value"
```
example attribute data-*
```php
setDataAnimalType('bird');
```
result
```html
data-animal-type="bird"
```
example attribute disabled
```php
setDisabled(true);
```
result
```html
disabled
```
### Arguments in constructor

* 'tagName' => string
* 'echoHtml' => true/false
* 'attributes' = [string, ...]
* 'children' = [string, ...]
* 'autoClose' = true/false

### Standard Functions

* setTagName(string):self
* echoHtml():self
* setAttribute(string):self
* setAttributes([string, ...]):self
* addChild(string or object TagGenerator):self
* addChildren([string or object TagGenerator, ...]):self
* setAutoClose(true/false):self
* generateHtml():string

