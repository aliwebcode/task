import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter);

// Define Components
import Home from "../components/Home";
import Login from "../components/auth/Login";
import Register from "../components/auth/Register";
import AddMenu from "../components/AddMenu";
import AddCategory from "../components/AddCategory";
import AddItem from "../components/AddItem";
import Menus from "../components/Menus";

// Define Guest Guard
function shouldGuest(to, from, next) {
    if (localStorage.getItem('token')) {
        next('/');
    } else {
        next();
    }
}
// Define Auth Guard
function shouldAuth(to, from, next) {
    if (localStorage.getItem('token')) {
        next();
    } else {
        next({
            path: '/login'
        })
    }
}

// All Routes
const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
            beforeEnter: shouldGuest
        },
        {
            path: '/register',
            component: Register,
            name: 'register',
            beforeEnter: shouldGuest
        },
        {
            path: '/add-menu',
            component: AddMenu,
            name: 'add_menu',
            beforeEnter: shouldAuth
        },
        {
            path: '/add-category',
            component: AddCategory,
            name: 'add_category',
            beforeEnter: shouldAuth
        },
        {
            path: '/add-item',
            component: AddItem,
            name: 'add_item',
            beforeEnter: shouldAuth
        },
        {
            path: '/menus',
            component: Menus,
            name: 'menus'
        }
    ]
});

export default routes;
