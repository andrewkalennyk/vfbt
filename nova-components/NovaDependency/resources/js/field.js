Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-dependency', require('./components/IndexField'))
    Vue.component('detail-nova-dependency', require('./components/DetailField'))
    Vue.component('form-nova-dependency', require('./components/FormField'))
})
