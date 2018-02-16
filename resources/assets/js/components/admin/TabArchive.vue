<template>
    <div>
        <div class="category-viewport">
            Choose category:
            <md-bottom-bar md-sync-route>
                <md-bottom-bar-item v-for="(category, index) in categories" :key="category.id" :md-label="category.name" @click="showCatArt(category.id, category.name)"></md-bottom-bar-item>
                <!--<md-bottom-bar-item to="/components/bottom-bar/posts" md-label="Posts" md-icon="/assets/icon-whatshot.svg"></md-bottom-bar-item>
                <md-bottom-bar-item to="/components/bottom-bar/favorites" md-label="Favorites" md-icon="favorite"></md-bottom-bar-item>-->
            </md-bottom-bar>
            <h3 id="category_title">{{category_name}}</h3>
        </div>
        <div class="col s2 offset-s6 text-center">

        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Active On</th>
                <th scope="col">Days Active</th>
                <th scope="col">Status</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(article, index) in archive_articles" :article="article" :key="`article-${index}`">
                <td>
                    <span><a :href="article.url" target="_blank">{{article.title}}</a> </span>
                </td>
                <td>
                    {{article.created_at | postedOn}}
                </td>
                <td>
                    {{article.updated_at | numberOfDays(article.created_at)}}
                </td>
                <transition name="fade" v-if="article_id !== article.id ">
                        <td>
                            <input type="button" style="background-color: orange"  class="btn btn-xs" :id="article.id" @click.prevent="activeStatus(article.id, index)"  value="inactive  " />
                            <!--:disabled="submitted"-->
                        </td>
                </transition>
                <transition name="fade" v-if="article_id !== article.id ">
                        <td ><a href="#" class="badge badge-primary" v-once @click="deleteArticle(article.id, index)" style="background-color: red" >  DELETE</a></td>
                </transition>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment'
    import {eventBus} from "../../app";

    export default {
        props:['articleID'],
        data(){
            return{
               archive_articles: '',
                cat_id: '',
                submitted: false,
                article_id: '',
                category_name: ''
            }
        },
        created(){

            this.getArchiveArticles();

        },
        computed:{
            categories(){
                return this.$store.state.categories;
            },


        },
        methods:{
            getArchiveArticles(){
                axios.get('api/get_archive_articles').then(resp => {
                    return this.$store.dispatch('getArchives', resp.data.archive);
                    //console.log(resp.data.archive)
                })
            },
            showCatArt(cat_id, cat_name){
                this.archive_articles = this.$store.getters.getCategoryArchiveArticles(cat_id);
                this.category_name = cat_name;
                this.cat_id = cat_id;
            },
            activeStatus(articleID, index){
                eventBus.$emit('checkActiveStatus', {id: articleID, index: index});

                this.article_id = articleID;
                this.getArchiveArticles();

                this.archive_articles = this.$store.getters.getCategoryArchiveArticles(this.cat_id);

            },
            deleteArticle(id, index){
                axios.delete('api/delete-article/' + id).then(resp => {
                    this.$store.dispatch('deleteArticle', {id: 'archive_article', index: index});
                    const cat_id = resp.data.cat_id;

                    this.showCatArt(cat_id);
                    toastr.success('Article has been deleted.');
                })
            }

        },
        filters: {
            postedOn(value){
                if(value){
                    //return moment(String(value)).format('MM/DD/YY')
                    return moment(String(value)).format('L');
                }
            },
            numberOfDays(value, postedOn){
                if(value){
                    return moment(String(value)).subtract(postedOn, 'days').calendar();
                }
            }

        }
    }
</script>

<style scoped>
    .category-viewport {
        /* width: 322px;
         height: 200px;*/
        display: inline-flex;
        align-items: flex-end;
        overflow: hidden;
        border: 1px solid rgba(63, 127, 191, .26);
        background: rgba(191, 189, 63, .06);
        margin-left: 10px;
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