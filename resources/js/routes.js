import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home').default
    },
    {
        path: '/chores',
        component: require('./views/Chores').default
    },
    {
        path: '/digest',
        component: require('./views/Digest').default
    },
    {
        path: '/digest/day',
        component: require('./views/Digest').default,
        props: {view: 'Day'}
    },
    {
        path: '/digest/week',
        component: require('./views/Digest').default,
        props: {view: 'Week'}
    },
    {
        path: '/digest/month',
        component: require('./views/Digest').default,
        props: {view: 'Month'}
    },
    {
        path: '/login',
        component: require('./views/Login').default
    },
    {
        path: '/register',
        component: require('./views/Register').default
    },
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active',
});