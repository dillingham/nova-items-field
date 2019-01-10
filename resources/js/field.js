Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-items-field', require('./components/IndexField'))
    Vue.component('detail-nova-items-field', require('./components/DetailField'))
    Vue.component('form-nova-items-field', require('./components/FormField'))
})
