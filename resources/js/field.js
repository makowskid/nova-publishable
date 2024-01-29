import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-publishable', IndexField)
  app.component('detail-nova-publishable', DetailField)
  app.component('form-nova-publishable', FormField)
})
