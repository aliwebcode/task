<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Register</div>

            <div class="card-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" v-model="name" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="email" required autocomplete="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" v-model="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" @click="register">
                                Register
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
    name: "Register",
    data() {
      return {
          name: "",
          email: "",
          password: "",
          password_confirmation: ""
      }
    },
    methods: {
        register() {
          axios.post('api/register_action', {
              name: this.name,
              email: this.email,
              password: this.password,
              password_confirmation: this.password_confirmation,
          })
            .then(() => {
                this.$router.push('/login')
            })
        }
    }
}
</script>

<style scoped>

</style>
