<template>
    <div>
        <div class="category-viewport">
            Choose category:
            <md-bottom-bar md-sync-route>
                <md-bottom-bar-item v-for="(category, index) in categories" :key="category.id" :md-label="category.name" @click="showCatArt(index + 1)"></md-bottom-bar-item>
                <!--<md-bottom-bar-item to="/components/bottom-bar/posts" md-label="Posts" md-icon="/assets/icon-whatshot.svg"></md-bottom-bar-item>
                <md-bottom-bar-item to="/components/bottom-bar/favorites" md-label="Favorites" md-icon="favorite"></md-bottom-bar-item>-->
            </md-bottom-bar>
        </div>
    </div>
</template>

<script>
    export default {
        name: "choose-category"
    }
</script>

<style scoped>

</style>