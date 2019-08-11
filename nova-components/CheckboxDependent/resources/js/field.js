Nova.booting((Vue, router, store) => {
    Vue.component('index-checkbox-dependent', require('./components/IndexField'))
    Vue.component('detail-checkbox-dependent', require('./components/DetailField'))
    Vue.component('form-checkbox-dependent', require('./components/FormField'))
})
