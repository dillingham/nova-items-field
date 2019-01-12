# TODO

I'd like to see a way to make associative arrays
Im thinking declairing the keys like so
And it would make a 3 column row of inputs

```php
Items::make('People')
    ->keys(['name', 'phone', 'email'])
    ->rules([
        'people.*.name' => 'alpha|min:2',
        'people.*.phone' => 'digits:10',
        'people.*.email' => 'email|min:6',
    ]),
```

Futher down the line maybe declairing input types too

```
Items::make('People')
    ->fullWidth()
    ->keys([
        'name' => 'text',
        'phone' => 'tel',
        'email' => 'email',
        'color' => 'color',
        'type' => ['type-1', 'type-2'], // select
    ])
```

Maybeeeee one day, probably not :)

```
Items::make('People')
    ->keys([
        'user_id' => BelongsTo::make('User'),
        'type' => Select::make('Type')->options(['type-1', 'type-2]),
    ])->rules([
        'people.*.user_id' => 'exists'
    ])
```