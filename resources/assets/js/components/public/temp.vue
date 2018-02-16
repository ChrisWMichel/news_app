<template>
    <div>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <router-link v-for="category in categories" :key="category.id"
                                 :to="{name: 'articles', params:{category_id: category.id }}"

                                 tag="li"
                                 class="active-menu waves-effect waves-dark active"><a>
                        <i class="fa fa-dashboard"></i>
                        {{ category.name}}</a>
                    </router-link>
                    <li>
                        &nbsp;
                    </li>


                    <li>

                    </li>
                </ul>

            </div>
            <img :src="image" alt="Being Liberal" id="sideImage" >
        </nav>
        <div v-if="$store.state.initialDisplay">
            <div class="wrapper">
                <div class="col2" v-for="article in articles" :key="article.id">
                    <div class="flex-container animated zoomIn">
                        <div class="flex-card">
                            <a :href="article.url" target="_blank" >
                                <img class="getImage" :src="article.image_url" alt="no image" height="74"><br> <!-- width="142"-->

                                <h4>{{article.title}}</h4>

                                <div v-if="article.author !== 'none'">
                                    <small>By: {{article.author}}</small>
                                </div>
                                <div v-if="article.site !== 'none'">
                                    <small>From: {{article.site}}</small>
                                </div>
                                <p class="article-description">{{article.description}}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col4"><!--col s3-->
                    <h2>Advertisment1</h2>
                </div>
                <!--<div class="col4row2">&lt;!&ndash;col s3&ndash;&gt;
                    <h2>Advertisment2</h2>
                </div>-->
                <div class="col4row3"><!--col s3-->
                    <h2>Advertisment2</h2>
                </div>
            </div>

        </div>

        <router-view></router-view>


    </div>
</template>

<script>

    export default {

        data(){
            return{
                image: 'images/sideMenu.jpg',
                categories: '',
                category_id: 1,
                articles: '',
            }
        },
        created(){
            this.getCategories();
            this.getActiveArticles();
        },
        methods:{
            getCategories(){
                axios.get('api/get_categories').then((resp) => {
                    this.$store.dispatch('uploadCategories', resp.data.categories);
                    this.categories = this.$store.state.categories;
                })
            },
            getActiveArticles(){
                axios.get('api/get_active_articles').then(resp => {
                    this.$store.dispatch('getActiveArticles', resp.data.articles);
                    this.articles = this.$store.getters.getCategoryArticles(this.category_id);
                })
            },

        }
    }
</script>

<style scoped>
    .wrapper{
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        grid-gap: 50px;
        grid-auto-rows: minmax(100px, auto);
    }
    .col2{
        grid-column: 3 / 7;

    }
    .col4{
        grid-column: 7 / 8;
        grid-row: 1;
        border: 1px solid black;
        padding: 6px;
    }
    .col4row2{
        grid-column: 7 / 8;
        grid-row: 2;
    }
    .col4row3{
        grid-column: 7 / 8;
        grid-row: 3;
        border: 1px solid black;
        padding: 6px;
    }
    .flex-card:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
    .flex-card a{
        text-anchor: none;
        text-decoration: none;
    }
    .flex-card h4{
        font-weight: bolder;
        margin-top: -15px;
        color: #0f0f0f;
    }
    .flex-card {
        padding: 8px;
        flex: 1;
        flex-grow: 1;
        flex-shrink: 0;
        flex-basis:400px;
        display: flex;
        flex-wrap: wrap;
        background: #ffffff;
        margin: .5rem;
        -webkit-transition: all 250ms;
        -moz-transition: all 250ms;
        transition: all 250ms;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23); }
    .flex-card div {
        flex: 100%; }
    .flex-card img {
        /*display: inline-block;*/
        float: left;
        padding: 6px;
        min-height: 100px;
        max-height: 74px;
    }
    @media(max-width:768px) {

        #sideImage{
            display: none;
        }

        .navbar-header {
            background: #00BFFF;
        }
        .navbar-brand{
            display: none;
        }
        .navbar-side {
            z-index: 2;
            position: fixed;
            width: 260px;
            top: 69px;
            box-shadow: none;
        }
    }
</style>