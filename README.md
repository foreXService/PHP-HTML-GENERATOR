# PHP HTML GENERATOR
Create HTML tags in php code .

## Create 

```php
$div = new TagGenerator()->setTagName('div');
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

## Atributes
* One attribute
```php
new TagGenerator([
        'tagName'=>'div',
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
* More attributes
```php
new TagGenerator([
        'tagName'=>'div',
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




### Structured
* Add one element
```php
new TagGenerator([
        'tagName'=>'div',
        'children'=>[
            new TagGenerator(['p'])
        ]
    ]);
```
or
```php
$div->addChlid(new TagGenerator(['p']));
```
or
```php
$div->addChlidren([
    new TagGenerator(['p'])
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
            new TagGenerator(['p']),
            new TagGenerator(['p']),
            new TagGenerator(['p'])
        ]
    ]);
```
or
```php
$div->addChlid('Hello !!!')
    ->addChlid(new TagGenerator(['p']))
    ->addChlid(new TagGenerator(['p']))
    ->addChlid(new TagGenerator(['p']));
```
or
```php
$div->addChlidren([
    'Hello !!!',
    new TagGenerator(['p']),
    new TagGenerator(['p']),
    new TagGenerator(['p'])
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

### More
* how to generate attributes
```php
setAtributeName('value')
```
result
```html
atribute-name="value"
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

