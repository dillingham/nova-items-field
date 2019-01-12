### Nova Items Field

[![Latest Version on Github](https://img.shields.io/github/release/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)
[![Total Downloads](https://img.shields.io/packagist/dt/dillingham/nova-items-field.svg?style=flat-square)](https://packagist.org/packages/dillingham/nova-items-field)

Simple Nova field for flat array inputs

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

| function | description | required | default |
| - | - | - | - |
| `draggable(boolean)` | turn on drag/drop sorting | No | false |
| `fullWidth(boolean)` | increase size of field | No | false |
| `placeholder(text)` | the new item input text | No | "Add a new item" |
| `listFirst()`| move form after the list  | No | false |
| `deleteButtonValue(html)` | value for delete button | No | "x" |
| `createButtonValue(html)` | value for create button | No | "Add" |
| `inputType(text)` | text, date, etc | No | "text" |

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

### Feature Todo

- [ ] Sortable / draggable items
