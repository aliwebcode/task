<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Login</div>

            <div class="card-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="formData.email" required autocomplete="email" autofocus>
                            <p class="text-danger" v-text="errors.email"></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" v-model="formData.password" required autocomplete="current-password">
                            <p class="text-danger" v-text="errors.password"></p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="button" class="btn btn-primary" @click="login">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            formData: {
                email: "",
                password: "",
                device_name: "browser"
            },
            errors: {}
        }
    },
    methods: {
        login() {
            axios.post('api/login', this.formData)
            .then((response) => {
                localStorage.setItem('token', response.data)
                window.location.href = '/'
            })
            .catch((errors) => {
                this.errors = errors.response.data.errors
            })
        }
    }
}
</script>

<style scoped>

</style>
