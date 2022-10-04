<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                Task
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <router-link class="nav-link btn" to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/login" v-if="!isLogging">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/register" v-if="!isLogging">Register</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link btn" to="/add-item" v-if="isLogging">Add Item</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link btn" to="/add-category" v-if="isLogging">Add Category</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="javascript:void(0)" v-if="isLogging" @click="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    props: ['isLogging'],
    methods: {
        logout() {
            localStorage.removeItem('token')
            window.location.href = '/login'
        }
    }
}
</script>

<style scoped>

</style>
