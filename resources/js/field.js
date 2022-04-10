import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
    app.component('index-nova-items-field', IndexField)
    app.component('detail-nova-items-field', DetailField)
    app.component('form-nova-items-field', FormField)
})
