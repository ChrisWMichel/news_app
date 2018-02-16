<template>
    <div>
        <side-menu></side-menu>
        <div class="wrapper small-screen"><!--row justify-content-md-center-->
            <div v-for="article in getCategoryArticles(category_id)" :key="article.id" class="col2">
                <div class=" flex-container animated zoomIn "> <!--col s5 offset-l3  col-sm-5 col-sm-offset-3-->
                    <div class="flex-card">
                        <a :href="article.url" target="_blank" >
                            <img class="getImage" :src="article.image_url" alt="no image" height="74"><br> <!-- width="142"-->

                            <h4>{{article.title}}</h4>

                            <div v-if="article.author !== 'none'">
                                <small>By: {{article.author}}</small>
                            </div>
                            <div v-if="article.site !== 'none'">
                                <small>From: {{article.site}}</small>
                            </div><br>
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
</template>

<script>
    import {mapGetters} from 'vuex'
    //import sideMenu from './SideMenu'
/* this.$route.params.category_id*/
    export default {
        component:{
            //'side-menu': sideMenu
        },
        data(){
            return{
                category_id: this.$route.params.category_id || 1,
            }
        },
        created(){
            this.$store.commit('initialDisplayOff');
            console.log('DispalyArticles');
        },
        computed:{
            ...mapGetters([
                'getCategoryArticles'
            ])
        },
        watch:{
            '$route'(to, from){
                this.category_id = to.params.category_id;
            }
        },
    }
</script>

<style>
    .wrapper{
        margin-top: 60px;
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
        text-decoration: none !important;
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
        .wrapper{
            margin-top: 120px;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-gap: 50px;
            grid-auto-rows: minmax(100px, auto);
        }
        .col2{
            grid-column: 3/7;

        }
        .col4{
            grid-column: 3/7;
            /*grid-row: 1;*/
            border: 1px solid black;
            padding: 6px;
        }
        .col4row2{
            grid-column: 7 / 8;
            grid-row: 2;
        }
        .col4row3{
            grid-column:3/7;
            /* grid-row: 3;*/
            border: 1px solid black;
            padding: 6px;
        }
    }
</style>