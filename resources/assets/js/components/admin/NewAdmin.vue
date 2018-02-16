<template>
    <div>
        <h3>Manage Admins</h3>
        <div class="row">
            <div class="col s4">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Admin Since:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="admin in admins" :key="admin.id">
                        <td>{{admin.firstname}} {{admin.lastname}}</td>
                        <td>{{admin.created_at | formatDate}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col s4 offset-l1">
                <h3>Add New Admin</h3><br>
                <form class="form-horizontal" method="POST" @submit.prevent="RegisterNewAdmin">
                    <div class="row">
                        <div class="input-field col s10">
                            <input  id="firstname" type="text"  v-model="form.firstname" required/>
                            <label for="firstname">First Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s10">
                            <input  id="lastname" type="text"  v-model="form.lastname" required/>
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s10" :class="{'has-error': errors.email}">
                            <input  id="email" type="text"  v-model="form.email" required/>
                            <label for="email">Email</label>
                            <span class="help-block" v-for="error in errors.email" v-text="error"></span>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-9">
                            <button type="submit" id="submitForm"  @click.once :disabled="!isValidRegisterForm" class="btn btn-primary">
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
    import axios from 'axios'
    import moment from 'moment'


    export default {
        data(){
            return {
                admins: '',
                form:{
                    firstname: '',
                    lastname: '',
                    email: ''
                },
                errors: [],


            }
        },
        created(){
            this.getAdmins();
        },
        computed:{
            isValidRegisterForm(){
                return this.emailIsValid() && this.form.firstname && this.form.lastname;
            },

        },
        methods:{
            getAdmins(){
                axios.get('api/get_admins').then((resp) => {
                    this.$store.dispatch('uploadAdmins', resp.data.admins);
                    this.admins = this.$store.state.admins;
                })
            },
            emailIsValid()
            {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email))
                {
                    return (true)
                }else{
                    return (false)
                }
            },
            RegisterNewAdmin(){
                axios.post('/notify-admin', {
                    firstname: this.form.firstname,
                    lastname: this.form.lastname,
                    email: this.form.email,
                }).then(response => {
                    this.form.firstname = '';
                    this.form.lastname = '';
                    toastr.success('An email has been sent to ' + this.form.firstname + ' to complete his registration.');
                    setTimeout(() =>{
                        location.reload();
                    }, 2000);

                }).catch(error => {

                    console.log(error.response);
                    this.errors = error.response.data.errors;

                })
            }
        },
        filters: {
            formatDate(value){
                if(value){
                    //return moment(String(value)).format('MM/DD/YY')
                    return moment(String(value)).fromNow();
                }
            }
        }
    }
</script>

<style scoped>

</style>