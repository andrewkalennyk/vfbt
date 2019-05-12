Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'citizen-finder',
            path: '/citizen-finder',
            component: require('./components/Tool'),
        },
    ])
})
