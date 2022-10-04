import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Home from "../components/Home";
import Login from "../components/auth/Login";
import Register from "../components/auth/Register";
import AddMenu from "../components/AddMenu";
import AddCategory from "../components/AddCategory";
import AddItem from "../components/AddItem";

function checkIfLogin(to, from, next) {
    if (localStorage.getItem('token')) {
        next('/');
    } else {
        next();
    }
}

function guardRoute(to, from, next) {
    if (localStorage.getItem('token')) {
        next();
    } else {
        next({
            path: '/login'
        })
    }
}

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
            beforeEnter: checkIfLogin
        },
        {
            path: '/register',
            component: Register,
            name: 'register',
            beforeEnter: checkIfLogin
        },
        {
            path: '/add-menu',
            component: AddMenu,
            name: 'add_menu',
            beforeEnter: guardRoute
        },
        {
            path: '/add-category',
            component: AddCategory,
            name: 'add_category',
            beforeEnter: guardRoute
        },
        {
            path: '/add-item',
            component: AddItem,
            name: 'add_item',
            beforeEnter: guardRoute
        }
    ]
});

export default routes;
