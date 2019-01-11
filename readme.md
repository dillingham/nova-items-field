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

```php
use NovaItemsField\Items;
```
```php
Items::make('Emails')->values($this->emails),
```

### Methods 

| function | description | required | default |
| - | - | - | - |
| **values(array)** | add a model's array | Yes | -- |
| **inputType(text)** | text, date, etc | No | "text" |
| **fullWidth(boolean)** | increase size of field | No | false |
| **placeholder(text)** | the new item input text | No | "Add a new item" |
| **listFirst()**| move form after the list  | No | false |
| **deleteButtonValue(html)** | value for delete button | No | "x" |
| **createButtonValue(html)** | value for create button | No | "Add" |

### Validation

```php

Items::make('Emails')->values($this->emails)->rules([
    'emails.*' => 'email|min:10',
]),
```

![validation](https://user-images.githubusercontent.com/29180903/51055617-54a36d00-15ae-11e9-86d2-b8a2b14e5d5a.png)

### Sidenotes


Be sure to cast `emails` to an array in your eloquent model.

```php
public $casts = [
    'emails' => 'array'
];
```

**Don't want to store the array?**

Use the array as a temporary variable

- make an [observer](https://nova.laravel.com/docs/1.0/resources/#resource-events)
- handle the array manually.
- unset the array to avoid sql error

```php

function saving($user)
{
    foreach($user->emails as $email)
    {
        //
    }
    
    unset($user->emails);
}
```

### Feature Todo

- [ ] Sortable / draggable items
