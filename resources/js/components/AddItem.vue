<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add New Item</div>

            <div class="card-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" v-model="formData.title" required autocomplete="title" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>
                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" v-model="formData.price" required autocomplete="price">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category" class="col-md-4 col-form-label text-md-end">Parent (Optional)</label>
                        <div class="col-md-6">
                            <select name="category_id" id="category" class="form-control" v-model="formData.category_id">
                                <option value="" disabled>Select Parent</option>
                                <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col-md-4 col-form-label text-md-end">Discount (Optional)</label>
                        <div class="col-md-6">
                            <input id="discount" type="number" min="1" class="form-control" name="discount" v-model="formData.discount" required autocomplete="discount">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-4">
                            <button type="button" class="btn btn-primary" @click="add" :disabled="loading == true">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="alert alert-success" v-if="success">{{ success.message }}</div>
                    <div class="alert alert-danger" v-if="errors">{{ errors.message }}</div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../helpers/api";
export default {
    name: "AddItem",
    mounted() {
        api.get('/get-user-categories')
            .then((res) => {
                this.categories = res.data
            })
    },
    data() {
        return {
            categories: [],
            formData: {
                title: '',
                discount: '',
                price: '',
                category_id: ''
            },
            success: '',
            errors: '',
            loading: false
        }
    },
    methods: {
        add() {
            this.success = ''
            this.errors = ''
            this.loading = true
            api.post('/add-item', {
                data: this.formData
            })
                .then((res) => {
                    this.success = res.data
                })
                .catch((err) => {
                    this.errors = err.response.data
                })
                .finally(() => this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
