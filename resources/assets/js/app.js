


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import {routes} from "./routes";
import {store} from './store/store'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import Vuetify from 'vuetify'


Vue.use(Vuetify);

Vue.use(VueMaterial);

Vue.use(VueRouter);

export const eventBus = new Vue();


const router = new VueRouter({
    routes,
    //mode: 'history',
    scrollBehavior(to, from, savedPosition){
        if(savedPosition){
            return savedPosition;
        }
        if(to.hash){
            return {selector: to.hash};
        }
        return {x: 0, y:0};
    },

});

Vue.component('vue-login', require('./components/auth/Login.vue'));
Vue.component('vue-register', require('./components/auth/Register.vue'));
Vue.component('app-dashboard', require('./components/admin/dashboard/DashboardComponent'));
Vue.component('app-articles', require('./components/admin/ArticlesComponent'));
Vue.component('app-sections', require('./components/admin/SectionsComponent'));
Vue.component('app-categories', require('./components/admin/Categories'));
Vue.component('manage-articles', require('./components/admin/manageArticles'));
Vue.component('tab-archive', require('./components/admin/TabArchive'));
Vue.component('comments', require('./components/admin/comments/Comments'));
Vue.component('manage-members', require('./components/admin/members/Members'));
Vue.component('advertisements', require('./components/admin/advertisements/Advertisement'));
Vue.component('new-admin', require('./components/admin/NewAdmin'));


Vue.component('side-menu', require('./components/public/SideMenu'));
Vue.component('display-articles', require('./components/public/DisplayArticles'));
Vue.component('view-route', require('./components/public/ViewRoute'));


const app = new Vue({
    el: '#app',
    router,
    store,
    VueMaterial,
    Vuetify,
});
