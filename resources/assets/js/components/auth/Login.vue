<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="panel panel-default" style="max-width: 100%;">
                <div class="modal-header">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">X</button>
                    <h5 class="text-uppercase panel-heading" v-if="!forgotPass">Login</h5>
                    <h5 class="text-uppercase panel-heading" v-else>Reset Password</h5>
                </div>

               <!-- <br><br>-->

                <div class="panel-body">
                    <div v-if="forgotPass">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="email-forg" class="col-md-12">Email</label>
                                <div  class="col-md-12">
                                    <input id="email-forg" name="email-forg" type="email" class="form-control" v-model="email_forg" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" :disabled="!isValidResetForm" @click.prevent="forgotPassword" class="btn btn-primary">Send Request</button>
                                </div>
                            </div>
                            <div class="form-group" v-if="requestSent">
                                <div class="col-md-12">
                                    <h3>A confirmation email has been sent to you. Close this window and check your email.</h3>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div v-else>
                        <form class="form-horizontal" method="POST" >

                            <label for="email" class="col-md-12">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" v-model="email" name="email" required autofocus>

                            </div>



                            <label for="password" class="col-md-12">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" v-model="password" name="password" required>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="remember" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 col-md-offset-4">
                                    <a style="font-size: 12px; cursor: pointer"  @click="showPassForm">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                            <div class="alert alert-danger" v-if="errors.length > 0">
                                <div v-for="error in errors">
                                    <p>{{error}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-10">
                                    <button type="button" :disabled="!isValidLoginForm" @click.prevent="attemptLogin" class="btn btn-primary">
                                        Login
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data(){
            return{
                email: '',
                password: '',
                remember: true,
                loading: false,
                errors: [],
                forgotPass: false,
                email_forg: '',
                requestSent: false
            }
        },
        computed:{
            isValidLoginForm(){
                return this.emailIsValid() && this.password && !this.loading;
            },
            isValidResetForm(){
                return this.emailIsValid();
            }
        },
        methods:{
            emailIsValid()
            {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email) ||
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email_forg))
                {
                    return (true)
                }else{
                    return (false)
                }
            },
            attemptLogin(){
                this.loading = true;
                axios.post('/login', {
                    email: this.email, password: this.password, remember: this.remember
                }).then(response => {
                    toastr.success('You are now logged in.');
                    setTimeout(() =>{
                        location.reload();
                    }, 2000);

                }).catch(error => {
                    console.log('error section');
                    this.loading = false;
                    if(error.response.status == 422){
                        this.errors.push("We couldn't verify your account details.");
                    }else{
                        this.errors.push("Something went wrong. Please refresh and try again.");
                    }
                })
            },
            forgotPassword(){
                let email = this.email_forg;
                this.email_forg = '';
                axios.post('api/reset/password', {
                    email: email,
                }).then((resp) => {
                    //toastr.success('Please check your email for confirmation.');
                    //console.log(resp.data.user);
                    this.requestSent = true;
                })
            },
            showPassForm(){
                this.forgotPass = true;

            },

        }
    }
</script>

<style scoped>
    .modal-dialog{max-width:800px; width:auto !important;}
</style>
