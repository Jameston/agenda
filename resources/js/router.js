
import Vue from 'vue';
import Router from 'vue-router';
import home from './modules/home/home';
import editContact from './modules/home/editContact';
import histcont from './modules/home/histcont';
import newCont from './modules/home/newContact'


Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/home',
            name: 'home',
            component: home,
        },
        {
            path: '/editContact/:id',
            name: 'edit',
            component: editContact,
        },
        {
            path: '/newCont/',
            name: 'new-cont',
            component: newCont,
        },
        {
            path: '/HistCont/:id',
            name: 'histcont',
            component: histcont,
        },
    ],
});
