<template>
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="panel panel-default" style="max-width: 100%;">
                <div class="modal-header">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">X</button>
                    <h5 class="text-uppercase panel-heading">Register</h5>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" @submit.prevent="attemptRegister">

                        <label  class="col-md-12">First Name</label>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" v-model="form.firstname" name="firstname" required autofocus>

                        </div>

                        <label  class="col-md-12">Last Name</label>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" v-model="form.lastname" name="lastname" required>

                        </div>

                        <label class="col-md-12">E-Mail Address</label>

                        <div :class="{'form-group col-md-12': true,'has-error': errors.email}">
                            <input  type="text" class="form-control" v-model="form.email" name="email" required>
                            <span class="help-block" v-for="error in errors.email" v-text="error"></span>
                        </div>

                        <label  class="col-md-12">Password</label>

                        <div :class="{'form-group col-md-12': true,'has-error': errors.password}">
                            <input  type="password" class="form-control" v-model="form.password" name="password" required>
                            <span class="help-block" v-for="error in errors.password" v-text="error"></span>
                        </div>

                        <label class="col-md-12 ">Confirm Password</label>

                        <div :class="{'form-group col-md-12': true,'has-error': errors.password_confirm}">
                            <input  type="password" class="form-control" v-model="form.password_confirm" name="password_confirm" required>
                            <span class="help-block" v-for="error in errors.password_confirm" v-text="error"></span>
                        </div>
                        <br>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-9">
                                <button type="submit" :disabled="!isValidRegisterForm" class="btn btn-primary">
                                    Register
                                </button>

                            </div>
                        </div>
                    </form>
                </div>


                <!--<p class="text-center text-muted fs-13 mt-20">Don't have an account? <a href="page-redirect">Sign Up</a> </p>-->
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data(){
            return{
                form:{
                    firstname: '',
                    lastname: '',
                    email: '',
                    password: '',
                    password_confirm: ''
                },
                loading: false,
                errors: []
            }
        },
        computed:{
            isValidRegisterForm(){
                return this.emailIsValid() && this.form.password && this.form.firstname && this.form.lastname && this.form.password_confirm;
            },

        },
        methods:{
            emailIsValid()
            {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email))
                {
                    return (true)
                }else{
                    return (false)
                }
            },
            attemptRegister(){
                this.loading = true;
                axios.post('/register', {
                    firstname: this.form.firstname,
                    lastname: this.form.lastname,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirm: this.form.password_confirm
                }).then(response => {
                    toastr.success('Registration successful! You are now logged in.');
                    setTimeout(() =>{
                        location.reload();
                    }, 2000);

                }).catch(error => {
                    this.loading = false;
                    console.log(error.response);
                    this.errors = error.response.data.errors;

                })

            }
        }
    }
</script>
<style scoped>
    .modal-dialog{max-width:800px; width:auto !important; }
</style>
