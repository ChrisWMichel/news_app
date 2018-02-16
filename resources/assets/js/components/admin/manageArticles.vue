<template>
    <div>
        <h3>Manage Articles</h3>
        <hr>
        <div class="container">
            <header>
                <div id="material-tabs">
                    <a id="tab1-tab" href="#tab1" class="active">Acitive Articles</a>
                    <a id="tab2-tab" href="#tab2">Archives</a> <!-- @click="tabSwitch('archives')"-->
                    <span class="yellow-bar"></span>
                </div>
            </header>
            <div class="row">
            <div class="tab-content">
                <div id="tab1">
                    <div class="category-viewport">
                        Choose category:
                        <md-bottom-bar md-sync-route>
                            <md-bottom-bar-item v-for="(category, index) in categories" :key="category.id" v-model="category_name" :md-label="category.name" @click="showCatArt(category.id, category.name)"></md-bottom-bar-item>
                            <!--<md-bottom-bar-item to="/components/bottom-bar/posts" md-label="Posts" md-icon="/assets/icon-whatshot.svg"></md-bottom-bar-item>
                            <md-bottom-bar-item to="/components/bottom-bar/favorites" md-label="Favorites" md-icon="favorite"></md-bottom-bar-item>-->
                        </md-bottom-bar>
                        <h3 id="category_title">{{category_name}}</h3>
                    </div>

                    <table class="table striped responsive-table centered">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Title</th>
                            <th scope="col">Site</th>
                            <th scope="col">Description</th>
                            <th scope="col">Posted</th>
                            <th scope="col">Active</th>

                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="(article, index) in active_articles" :article="article" :key="`article-${index}`">

                            <td>
                                <input style="font-weight: bold"  v-model="edit_image" type="text" class="validate" v-if="edit_article && edit_id === article.id" >
                                <span v-else ><img class="resize" :src="article.image_url" /></span>
                            </td>
                            <td>
                                <textarea style="font-weight: bold"  v-model="edit_comment" type="text" class="validate" v-if="edit_article && edit_id === article.id" >{{article.admin_comment}}</textarea>
                                <span v-else >{{article.admin_comment}}</span>
                            </td>
                            <td>
                                <textarea style="font-weight: bold"  v-model="edit_title" type="text" class="validate" v-if="edit_article && edit_id === article.id" ></textarea>
                                <span v-else>{{article.title}}</span>
                            </td>
                            <td>
                                <input style="font-weight: bold"  v-model="edit_site" type="text" class="validate" v-if="edit_article && edit_id === article.id" >
                                <span v-else>{{article.site}}</span>
                            </td>
                            <td>
                                <textarea style="font-weight: bold"  v-model="edit_description" type="text" class="validate" v-if="edit_article && edit_id === article.id" ></textarea>
                                <span v-else>{{article.description}}</span>
                            </td>
                            <td>
                                {{article.created_at | formatDate}}
                            </td>
                            <!--<transition name="fade" v-if="article_id !== article.id ">-->
                            <td v-if="!edit_article">
                                <input type="button" class="btn btn-xs" :id="article.id" @click.prevent="checkActive(article.id, index)" value="active" />
                            </td>
                           <!-- </transition>-->
                            <!--<transition name="fade" v-if="article_id !== article.id ">-->
                                <td v-if="!edit_article"><a href="#" class="badge badge-primary" @click.prevent="showEdit(article.image_url, article.id, article.title, article.admin_comment, article.site, article.description)">Edit</a></td>
                            <!--</transition>-->
                            <td v-if="edit_article && edit_id === article.id">
                                <button class="btn btn-primary btn-sm mb-2" type="button" :disabled="!isValidEntry" @click="updateArticle(article.id)">Update Article</button>
                            </td>
                            <td v-if="edit_article && edit_id === article.id">
                                <button class="btn btn-warning btn-sm mb-2" type="button" @click.prevent="cancelEdit">Cancel</button>
                            </td>


                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="row">
                    <div class="tab-content" id="tab-cont">
                        <div id="tab2">
                            <tab-archive></tab-archive>
                        </div>
                    </div>
                </div>

                <!--</div>-->

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import moment from 'moment'
    import {eventBus} from "../../app";

    export default {
        components: {

        },
        data(){
            return{
                edit_article: false,
                category_name: '',
                article_id: '',
                edit_image: '',
                edit_comment: '',
                edit_title: '',
                edit_site: '',
                edit_description: '',
                edit_id: '',
                active_articles: '',
                archive_articles: '',
                categories: '',
                tabArchive: false,
            }
        },
        created(){
            this.getActiveArticles();
            //this.getArchiveArticles();
            this.getCategories();

            eventBus.$on('checkActiveStatus', (payload)=>{
                this.checkActive(payload.id, payload.index);
            });

        },
        computed:{
            isValidEntry(){
                return this.edit_title && this.edit_image && this.edit_description;
            },

        },
        methods:{
            showEdit(edit_image, id, title, comment, site, description){
                this.edit_article = true;
                this.edit_image = edit_image;
                this.edit_title = title;
                this.article_id = id;
                this.edit_id = id;
                this.edit_comment = comment;
                this.edit_site = site;
                this.edit_description = description;

                console.log('image: ' + this.edit_image);
            },
            updateArticle(id){
                {
                    axios.put('api/update-article/' + id, {
                        admin_comment: this.edit_comment,
                        image_url: this.edit_image,
                        title: this.edit_title,
                        site: this.edit_site,
                        description: this.edit_description
                    }).then(resp => {
                        this.edit_article = false;
                        this.getActiveArticles();
                        this.$store.dispatch('updateArticle', resp.data.article);
                        this.showCatArt(resp.data.article.category_id);
                        toastr.success('Update of article ' + this.edit_title + ' was successful!')
                        //console.log(resp.data.article);
                    })
                }
            },
            getCategories(){
                axios.get('api/get_categories').then((resp) => {
                    this.$store.dispatch('uploadCategories', resp.data.categories);

                    this.categories = this.$store.state.categories;
                    //console.log(this.categories);
                })
            },
            getActiveArticles(){
                axios.get('api/get_active_articles').then(resp => {
                    return this.$store.dispatch('getActiveArticles', resp.data.articles);
                    //this.active_articles = this.$store.state.active_articles;
                })
            },
            cancelEdit(){
                this.edit_article = false;
                this.edit_title = '';
                this.article_id = '';

            },
            showCatArt(cat_id, cat_name = 'none'){
                if(cat_name !== 'none'){
                    this.category_name = cat_name;
                }

                return this.active_articles = this.$store.getters.getCategoryArticles(cat_id);
            },

            checkActive(article_id, index){
                /*console.log('before deletion: ' + this.active_articles.length);*/

               axios.put('api/update-active/' + article_id).then(resp => {
                   let cat_id = resp.data.article.category_id;
                  if(resp.data.article.active === 0){

                      this.$store.dispatch('deleteArticle',  {id: 'active_article', index: index});

                      toastr.success('The article is no longer active.');
                  }else{
                      this.$store.dispatch('deleteArticle',  {id: 'archive_article', index: index});

                      toastr.success('The article is now active.');
                  }
                   this.$store.dispatch('addArticle',  resp.data.article);
                   this.getActiveArticles();
                   this.showCatArt(cat_id);
                  /* console.log('after deletion: ' + this.active_articles.length)*/

               });
            },
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
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,400italic,600,600italic,700,700italic);
    body {
        font-family: 'Roboto';
        background-color: #f9f9f9;
    }
    #tab-cont{
        margin-top: -50px;
    }

    .container{
        /*height:500px;*/
        width:100%;
        padding:0;
        margin:10px;
        border-radius:5px;
        box-shadow: 0 2px 3px rgba(0,0,0,.3)

    }

    header {
        position: relative;
    }

    .hide {
        display: none;
    }

    .tab-content {
        padding:25px;

    }

    #material-tabs {
        position: relative;
        display: block;
        padding:0;
        border-bottom: 1px solid #e0e0e0;
    }

    #material-tabs>a {
        position: relative;
        display:inline-block;
        text-decoration: none;
        padding: 22px;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        color: #424f5a;
        text-align: center;
        /*outline:;*/
    }

    #material-tabs>a.active {
        font-weight: 700;
        outline:none;
    }

    #material-tabs>a:not(.active):hover {
        background-color: inherit;
        color: #7c848a;
    }

    @media only screen and (max-width: 520px) {
        .nav-tabs#material-tabs>li>a {
            font-size: 11px;
        }
    }

    .yellow-bar {
        position: absolute;
        z-index: 10;
        bottom: 0;
        height: 3px;
        background: #458CFF;
        display: block;
        left: 0;
        transition: left .2s ease;
        -webkit-transition: left .2s ease;
    }

    #tab1-tab.active ~ span.yellow-bar {
        left: 0;
        width: 160px;
    }

    #tab2-tab.active ~ span.yellow-bar {
        left:165px;
        width: 82px;
    }

    #tab3-tab.active ~ span.yellow-bar {
        left: 253px;
        width: 135px;
    }

    #tab4-tab.active ~ span.yellow-bar {
        left:392px;
        width: 163px;
    }
    img.resize{
        max-width: 75%;
        max-height: 75%;
       /* float: left;*/

    }
    .category-viewport {
       /* width: 322px;
        height: 200px;*/
        display: inline-flex;
        align-items: flex-end;
        overflow: hidden;
        border: 1px solid rgba(63, 127, 191, .26);
        background: rgba(191, 189, 63, .06);
    }
    table td{

        overflow : hidden;
    }
    #category_title{
        padding: 6px;
        background-color: #fffa7e;
    }
    .fade-enter{
        opacity: 100;
    }
    .fade-enter-active{
        transition: opacity 1s;
    }
    .fade-leave{

    }
    .fade-leave-active{
        transition: opacity 1s;
        opacity: 0;
    }

</style>