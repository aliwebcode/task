<template>
    <div class="col-md-12">

        <div class="card my-3" v-if="menus.length">
            <div class="card-header">All Menus</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4" v-for="(menu, index) in menus">
                        <div :key="index">
                            <h5>{{ menu.title }}</h5>
                            <h6>({{ menu.categories_count }}) Categories</h6>
                            <button type="button" class="btn btn-success" @click="getCategories(menu.id)">Show Categories</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-3" v-if="categories.length">
            <div class="card-header">All Categories</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4" v-for="(category, index) in categories">
                        <div :key="index">
                            <h5>{{ category.title }}</h5>
                            <h6>Menu: {{ category.menu.title }}</h6>
                            <h6>({{ category.items_count }}) Items</h6>
                            <button type="button" class="btn btn-success" @click="getItems(category.id)">Show Items</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-3" v-if="items.length">
            <div class="card-header">All Items</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4" v-for="(item, index) in items">
                        <div :key="index">
                            <h5>{{ item.title }}</h5>
                            <h6>Price: <strong>{{ item.price }}$</strong></h6>
                            <h6>Category: {{ item.category.title }}</h6>
                            <h6>Discount: {{ item.final_discount ? item.final_discount + '%' : 'No Discount' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import api from "../helpers/api";
export default {
    name: "Menus",
    mounted() {
        api.get('/all-menus')
        .then((res) => {
            this.menus = res.data
        })
    },
    data() {
        return {
            menus: [],
            categories: [],
            items: [],
        }
    },
    methods: {
        getCategories(id) {
            api.get('/get-menu-categories/' + id)
            .then((res) => {
                console.log("HERE")
                this.menus = []
                this.categories = []
                this.categories = res.data
            })
        },
        getItems(id) {
            api.get('/get-category-items/' + id)
                .then((res) => {
                    console.log(res.data)
                    this.menus = []
                    this.categories = []
                    this.items = res.data
                })
        }
    }
}
</script>

<style scoped>

</style>
