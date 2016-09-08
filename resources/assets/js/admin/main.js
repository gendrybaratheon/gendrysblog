import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

import App from './App.vue';

Vue.use(VueRouter);
Vue.use(VueResource);

var router = new VueRouter({
    history: true,
    root: 'dashboard',
});

router.map({
    '/': {
        component: require('./components/Home.vue')
    },
    '/post/': {
        component: require('./components/Post.vue')
    },
    '/post/:id/edit': {
        name: 'editpost',
        component: require('./components/Editpost.vue')
    }
});

router.start(App, 'body');

