### Nova Items Field

[![Latest Version on Github](https://img.shields.io/github/release/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)
[![Total Downloads](https://img.shields.io/packagist/dt/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)

![nova-items-field](https://user-images.githubusercontent.com/29180903/50742708-dffeb600-11dc-11e9-9eed-36f42166c7c4.png)

Simple field for flat array inputs

![form](https://user-images.githubusercontent.com/29180903/50990350-cf518700-14df-11e9-8be0-bc7f5100b6f4.png)

![detail](https://user-images.githubusercontent.com/29180903/50990355-d082b400-14df-11e9-8012-59ca25aa1387.png)

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