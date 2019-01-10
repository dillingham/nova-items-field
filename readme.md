### Nova Items Field

[![Latest Version on Github](https://img.shields.io/github/release/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)
[![Total Downloads](https://img.shields.io/packagist/dt/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)


Simple Nova field for flat array inputs


![form](https://user-images.githubusercontent.com/29180903/50990350-cf518700-14df-11e9-8be0-bc7f5100b6f4.png)

### Installation
```
composer require dillingham/nova-items-field
```

### Usage

```
use NovaItemsField\Items;
```
```php
Items::make('Emails')->values($this->emails),
```

Be sure to cast `emails` to an array in your eloquent model.

```php

public $casts = [
    'emails' => 'array'
];
```

### Methods 

| function | description | required | default |
| - | - | - | - |
| **values(array)** | add a model's array | Yes | -- |
| **inputType(text)** | text, date, etc | No | "text" |
| **placeholder(text)** | the new item input text | No | "Add a new item" |
| **listFirst()**| move form after list  | No | false |
| **deleteButtonValue(html)** | value for delete button | No | "x" |
| **createButtonValue(html)** | value for create button | No | "Add" |
