<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add New Menu</div>

            <div class="card-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" v-model="title" required autocomplete="title" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col-md-4 col-form-label text-md-end">Discount (Optional)</label>
                        <div class="col-md-6">
                            <input id="discount" type="number" min="1" class="form-control" name="discount" v-model="discount" required autocomplete="discount">
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
                    <div class="alert alert-danger text-center" v-for="(error, index) in errors">
                        <p :key="index">{{ error[0] }}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../helpers/api";
export default {
    name: "AddMenu",
    data() {
      return {
          title: '',
          discount: '',
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
            api.post('/add-menu', {
                title: this.title,
                discount: this.discount,
            })
            .then((res) => {
                this.success = res.data
            })
            .catch((err) => {
                this.errors = err.response.data.errors
            })
            .finally(() => this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
