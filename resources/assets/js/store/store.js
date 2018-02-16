import Vue from 'vue';
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex);

export const store = new Vuex.Store({
    plugins:[createPersistedState({storage: window.sessionStorage})],
    state: {
        categories: '',
        active_articles: '',
        archive_articles:'',
        admins: ''
    },
    getters:{
        getCategoryArticles:(state)=>(cat_id)=>{
            //console.log(state.active_articles);
            return state.active_articles.filter(item =>{
                return item.category_id === cat_id;
            })
        },
        getCategoryArchiveArticles:(state)=>(cat_id)=>{
            //console.log('cat_id: ' + cat_id);
            return state.archive_articles.filter(item =>{
                return item.category_id === cat_id;
            })
        }
    },
    mutations:{
        getCategoryArticles:(state, cat_id)=>{
           // console.log('ID: ' + cat_id);
            return state.active_articles.filter(item =>{
                return item.category_id === cat_id;
            })
        },
        uploadCategories(state, payload){
            state.categories = payload;
        },
        getActiveArticles(state, payload){
            state.active_articles = payload;
        },
        getArchives(state, payload){
            state.archive_articles = payload;
        },
        updateArticle(state, payload){
            return state.active_articles.find((element)=>{
                 if(element.id === payload.id){
                     element.admin_comment = payload.admin_comment;
                     element.title = payload.title;
                     element.description = payload.description;
                     element.image_url = payload.image_url;
                     element.site = payload.site;

                     return element;
                 }
            });
        },
        deleteArticle(state, payload){

            if(payload.id === 'active_article'){
                state.active_articles.splice(payload.index, 1);
            }else{
                state.archive_articles.splice(payload.index, 1);
            }
        },
        addArticle(state, payload){

            if(payload.active === 0){
                state.archive_articles.push(payload);
            }else{
                state.active_articles.push(payload);
            }
        },
        uploadAdmins(state, payload){
            state.admins = payload;
        }
    },
    actions:{
        getCategoryArticles:({commit}, payload)=>{
            commit('getCategoryArticles', payload)
        },
        uploadCategories:({commit}, payload)=>{
            commit('uploadCategories', payload);
        },
        getActiveArticles:({commit}, payload)=>{
            commit('getActiveArticles', payload);
        },
        getArchives:({commit}, payload)=>{
            commit('getArchives', payload);
        },
        updateArticle:({commit}, payload)=>{
            commit('updateArticle', payload);
        },
        deleteArticle:({commit}, payload)=>{
            commit('deleteArticle', payload);
        },
        addArticle:({commit}, payload)=>{
            commit('addArticle', payload);
        },
        uploadAdmins:({commit}, payload)=>{
            commit('uploadAdmins', payload)
        }

    }
});
