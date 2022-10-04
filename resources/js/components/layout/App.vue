<template>
    <div>
        <Navbar :isLogging="isLogging" />
        <div class="container">
            <div class="row justify-content-center">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../partials/Navbar";
import api from "../../helpers/api"
export default {
    name: "App",
    components: {Navbar},
    data() {
        return {
            isLogging: false
        }
    },
    mounted() {
        let token = localStorage.getItem('token');
        if (token) {
            this.isLogging = true
            // api.get('/user')
            //     .then((res) => {
            //
            //     })
        }
    }
}
</script>

<style scoped>

</style>
