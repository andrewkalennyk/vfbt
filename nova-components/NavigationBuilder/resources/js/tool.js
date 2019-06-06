Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'navigation-builder',
            path: '/navigation-builder',
            component: require('./components/Tool'),
        },
    ])
})
