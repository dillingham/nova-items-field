## Nova Items Field

[![Latest Version on Github](https://img.shields.io/github/release/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)
[![Total Downloads](https://img.shields.io/packagist/dt/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)

Laravel Nova array items field with sorting & validation

![laravel-nova-array-input-field](https://user-images.githubusercontent.com/29180903/51056356-99300800-15b0-11e9-8084-3c2df5655dc2.png)

### Installation
```
composer require dillingham/nova-items-field
```

### Usage

```php
use NovaItemsField\Items;
```
```php
function fields() {
    return [
        Items::make('Emails'),
    ]
}
```
and be sure to cast the property as an array on your eloquent model
```php
public $casts = [
    'emails' => 'array'
];
```
### Validation
Use Laravel's built in [array validation](https://laravel.com/docs/5.7/validation#validating-arrays)
```php
Items::make('Emails')->rules([
    'emails.*' => 'email|min:10',
]),
```

### Additional options 

| function | description | default |
| - | - | - |
| `->draggable()` | turn on drag/drop sorting | false |
| `->fullWidth()` | increase the width of field area | false |
| `->listFirst()`| move add new to the bottom  | false |
| `->placeholder($value)` | the new item input text | "Add a new item" |
| `->deleteButtonValue($value)` | value for delete button | "x" |
| `->createButtonValue($value)` | value for create button | "Add" |
| `->inputType(text)` | text, date, etc | "text" |

### Array processing

Use the array to perform other actions

- make an [observer](https://nova.laravel.com/docs/1.0/resources/#resource-events)
- handle the array manually

```php
function saving($user)
{
    foreach($user->emails as $email)
    {
        //
    }
}
```
