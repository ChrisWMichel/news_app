<template>
    <div>
        <h3>Articles</h3>
        <hr>

        <div class="row">
            <div class="input-field col s4 offset-s3">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='#' data-activates='dropdownCat'>Select Category
                    <!--<i class="material-icons arrow-down-bold">Select Category</i>-->
                </a>&nbsp;
                {{ category_name}}
                <!-- Dropdown Structure -->
                <ul id='dropdownCat' class='dropdown-content'>
                    <li v-for="(category, index) in categories" @click="getCategory(category.id, category.name)"
                       v-model="category_name" :key="`category-${index}`"><a href="#!">{{category.name}}</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-field col s4 offset-s3">

                <label class="active" for="section_name">Add URL</label>
                <input  id="section_name" v-model="url" type="text" class="validate">
                <span class="bmd-help" style="font-weight: bold; color: red;" v-for="error in errors.name" v-text="error"></span>
            </div>
            <button class="btn waves-effect waves-light" type="button" :disabled="!categorySelected || showArticle" @click="addArticle" name="action">Add Article
                <!-- <i class="material-icons right">send</i>-->
            </button>
        </div>
        <div v-show="showArticle">
            <div class="row">
                <div class="input-field col s4 offset-s1">
                    <textarea id="textarea1" class="materialize-textarea" v-model="admin_comment" placeholder="Article has been stored. Would you like to add a comment for this article?"></textarea>
                    <label for="textarea1">Comment</label>
                </div>
                <button class="btn waves-effect waves-light" type="button" @click="addComment" name="action">Add Comment</button>
                <button class="btn waves-effect waves-light" type="button" @click="cancelComment" name="action">No</button>


            </div>
            <div class="row">
                <div class="input-field col s4 offset-s1" >

                    <div class="card card-1">
                        <a :href="article.url" target="_blank" >
                            <img class="getImage" :src="article.image_url" alt="no image" height="158"><br> <!-- width="142"-->

                            <h4>{{article.title}}</h4>

                            <div v-if="article.author !== 'none'">
                                <small>By: {{article.author}}</small>
                            </div>
                            <div v-if="article.site !== 'none'">
                                <small>From: {{article.site}}</small>
                            </div>
                            <p>{{article.description}}</p>
                        </a>
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
                url: '',
                categories: '',
                category_name: '',
                category_id: '',
                article:{
                    image_url: '',
                    title: '',
                    author: '',
                    description: '',
                    url: '',
                    site:'',
                    id:''
                },
                showArticle: false,
                admin_comment: '',
                errors: []
            }
        },
        created(){
            this.getCategories();
        },
        computed:{
            categorySelected(){
                return this.category_name;
            }
        },
        methods:{
            getCategories(){
                axios.get('api/get_categories').then((resp) => {
                    this.$store.commit('uploadCategories', resp.data.categories);

                    this.categories = this.$store.state.categories;
                    //console.log(this.categories);
                })
            },
            getCategory(id, name){
                this.category_id = id;
                this.category_name = name;
            },
            addArticle(){
                axios.post('api/add_article', {url: this.url, category_id: this.category_id}).then(resp => {
                    this.article.image_url = resp.data.article.image;
                    this.article.title = resp.data.article.title;
                    this.article.author = resp.data.article.author;
                    this.article.description = resp.data.article.description;
                    this.article.url = resp.data.article.url;
                    this.article.site = resp.data.article.site;
                    this.article.id = resp.data.article.article_id;

                    this.showArticle = true;

                    this.url = '';


                    console.log(resp.data);
                })
            },
            addComment(){
                axios.put('api/admin_comment/' + this.article.id, {comment: this.admin_comment})
                    .then(resp => {
                        this.showArticle = false;
                        this.resetData();
                        toastr.success('Your comment has been added to the article.');
                    })
            },
            cancelComment(){
                this.showArticle = false;
                this.resetData();
            },
            resetData(){
                this.article.image_url = '';
                this.article.title = '';
                this.article.author = '';
                this.article.description = '';
                this.article.url = '';
                this.article.site = '';
                this.article.id = '';
                this.admin_comment = '';
            }
        }

    }
</script>

<style scoped>
    .card {
        background: #fff;
        border-radius: 2px;
        display: inline-block;
        height: 175px;
        margin: 1rem;
        position: relative;
        width: 785px;
    }

    .card-1 {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .card-1:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
    .card a{
        text-anchor: none;
        text-decoration: none;
    }
    .card h4{
        font-weight: bolder;
        margin-top: -15px;
        color: #0f0f0f;
    }
    img.getImage{
        float: left;
        padding: 10px;
        min-height: 158px;
        max-height: 158px;
    }
</style>