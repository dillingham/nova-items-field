### Custom Detail Item Vue Component

In some cases, a basic list won't be what you're looking to output. 

The solution is simple: add a vue component to your app.js like so

```js
Nova.booting((Vue, router, store) => {
    Vue.component('custom-output-component', CustomComponent);
});

```
and tell the field which component to render the detail item with:

```php
    Items:make('Emails')->detailItemComponent('custom-output-component'),
```

and customize the design however you want.

```html
<template>
    <div>
        <p class="p-4">{{ item }}</p>
    </div>
</template>

<script>
export default {
    props: ['resource', 'item']
}
</script>
