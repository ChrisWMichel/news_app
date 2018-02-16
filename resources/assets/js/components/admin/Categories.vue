<template>
    <div>
        <h3>Categories</h3>
        <hr>

        <div class="row">
            <div class="input-field col s4 offset-s3">
                <label class="active" for="category_name">Category Name</label>
                <input  id="category_name" v-model="add_name" type="text" class="validate">
                <span class="bmd-help" style="font-weight: bold; color: red;" v-for="error in errors.name" v-text="error"></span>
            </div>
            <div class="input-field col s4 offset-s3">
                <label class="active" for="category_name">Add Font</label>
                <input  id="category_font" v-model="font" type="text" class="validate" placeholder="ex. fa-tachometer">

                <p>Click here to find a font-icon: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a> </p>
            </div>
            <div class="input-field col s4 offset-s3">
                <button class="btn waves-effect waves-light pull-right" type="button" @click="addCategory" name="action">Add Category
                    <!-- <i class="material-icons right">send</i>-->
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col s6 offset-s3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="(category, index) in categories" :key="`category-${index}`">
                        <td>
                            {{category.id}}
                        </td>
                        <td>
                            <input style="font-weight: bold"  v-model="edit_name" type="text" class="validate" v-if="edit_category && edit_id === category.id" >
                            <span v-else>{{category.name}}</span>
                        </td>
                        <td><input style="font-weight: bold"  v-model="font" type="text" class="validate" v-if="edit_category && edit_id === category.id" ></td>


                        <td v-if="!edit_category"><a href="#" class="badge badge-primary" @click.prevent="showEdit(category.id, category.name, category.font)">Edit</a></td>

                        <td v-if="edit_category && edit_id === category.id">
                            <button class="btn btn-primary btn-sm mb-2" type="button" :disabled="!isValidName" @click="editCategory(category.id)">Update</button>
                        </td>
                        <td v-if="edit_category && edit_id === category.id">
                            <button class="btn btn-warning btn-sm mb-2" type="button" @click.prevent="cancelEdit">Cancel</button>
                        </td>


                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data(){
            return {
                categories: '',
                add_name: '',
                errors:[],
                edit_category: false,
                edit_name: '',
                edit_id: '',
                font: ''

            }
        },
        created(){
            this.getCategories();
        },
        computed:{
            isValidName(){
                return this.edit_name;
            },

        },
        methods:{
            getCategories(){
                axios.get('api/get_categories').then((resp) => {
                    this.$store.commit('uploadCategories', resp.data.categories);

                    this.categories = this.$store.state.categories;
                    //console.log(this.categories);
                })
            },
            addCategory(){
                axios.post('api/add_category_name', {name: this.add_name, font: this.font})
                    .then(resp => {
                        this.getCategories();
                        this.add_name = '';
                        this.errors = '';
                    }).catch(error => {
                    this.errors = error.response.data.errors;
                })

            },
            showEdit(id, name, font){
                this.edit_category = true;
                this.edit_name = name;
                this.font = font;
                this.edit_id = id;

            },
            editCategory(id){

                axios.put('api/update_category/' + id, {name: this.edit_name, font: this.font})
                    .then(resp => {
                        this.getCategories();
                        this.edit_category = false;
                        this.edit_name = '';
                        this.font = '';
                        this.edit_id = '';
                        this.errors = '';
                        toastr.success('Update was successful.')
                    }).catch(error => {
                    this.errors = error.response.data.errors;
                })

            },
            cancelEdit(){
                this.edit_category = false;
                this.edit_name = '';
                this.edit_id = '';
            },
        }

    }
</script>

<style scoped>

</style>