<template>
    <div class="col-md-8">

        <div>
            <div class="card mb-2" v-if="!haveMenu">
                <div class="card-header">Add New Menu</div>
                <div class="card-body">
                    Start Adding Items By Creating <router-link to="/add-menu">New Menu</router-link>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Actions</div>
                <div class="card-body">
                    <router-link class="btn btn-primary mx-1" to="/add-item">Add Item</router-link>
                    <router-link class="btn btn-primary mx-1" to="/add-category">Add Category</router-link>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import api from "../helpers/api";
export default {
    mounted() {
        api.get('/get-menus')
        .then((res) => {
            if(res.data.menus.length == 0) {
                this.haveMenu = false
            }
        })
    },
    data() {
        return {
            haveMenu: true
        }
    }
}
</script>
