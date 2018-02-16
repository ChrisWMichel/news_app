<template>
    <div>
        <div class="header">
            <h3>Sections</h3>
            <hr>
        </div>
        <div class="row">
            <div class="input-field col s4 offset-s3">
                <label class="active" v-model="section_name" for="section_name">Section Name</label>
                <input  id="section_name" v-model="add_name" type="text" class="validate">
                <span class="bmd-help" style="font-weight: bold; color: red;" v-for="error in errors.name" v-text="error"></span>
            </div>
            <button class="btn waves-effect waves-light" type="button" @click="addSection" name="action">Add Section
               <!-- <i class="material-icons right">send</i>-->
            </button>
        </div>

        <div class="row">
            <div class="col s6 offset-s3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="(name, index) in section_name" :key="`name-${index}`">
                        <td>
                            {{name.id}}
                        </td>
                        <td>
                            <input style="font-weight: bold"  v-model="edit_name" type="text" class="validate" v-if="edit_section && edit_id === name.id" >
                            <span v-else>{{name.name}}</span>
                        </td>


                        <td v-if="!edit_section"><a href="#" class="badge badge-primary" @click="showEdit(name.id, name.name)">Edit</a></td>

                        <td v-if="edit_section && edit_id === name.id">
                            <button class="btn btn-primary btn-sm mb-2" type="button" :disabled="!isValidName" @click="editSection(name.id)">Update Name</button>
                        </td>
                        <td v-if="edit_section && edit_id === name.id">
                            <button class="btn btn-warning btn-sm mb-2" type="button" @click="cancelEdit">Cancel</button>
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
                section_name: '',
                add_name: '',
                errors:[],
                edit_section: false,
                edit_name: '',
                edit_id: ''

            }
        },
        created(){
            this.getSection();
        },
        computed:{
            isValidName(){
                return this.edit_name;
            },

        },
        methods:{
            getSection(){
                axios.get('api/get_sections').then((resp) => {
                    this.$store.commit('uploadSections', resp.data.sections);

                    this.section_name = this.$store.state.sections;
                    //console.log(this.section_name);
                })
            },
            addSection(){
                axios.post('api/add_section_name', {name: this.add_name})
                    .then(resp => {
                        this.getSection();
                        this.add_name = '';
                        this.errors = '';
                    }).catch(error => {
                        this.errors = error.response.data.errors;
                })

            },
            showEdit(id, name){
               this.edit_section = true;
               this.edit_name = name;
               this.edit_id = id;

            },
            editSection(id){

                axios.put('api/update_section_name/' + id, {name: this.edit_name})
                    .then(resp => {
                        this.getSection();
                        this.edit_section = false;
                        this.edit_name = '';
                        this.edit_id = '';
                        this.errors = '';
                        toastr.success('Update was successful.')
                    })

            },
            cancelEdit(){
                this.edit_section = false;
                this.edit_name = '';
                this.edit_id = '';
            },
        }

    }
</script>

<style scoped>

</style>