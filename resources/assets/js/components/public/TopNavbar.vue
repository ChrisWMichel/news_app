<template>
    <v-toolbar class="toolbar--fixed sidebar-collapse " color="blue lighten-3"><!--dark color="primary"-->
        <v-toolbar-side-icon id="sideNav"  data-toggle="collapse">

        </v-toolbar-side-icon>
        <v-toolbar-title class="white--text">Being Liberal</v-toolbar-title>


        <v-spacer></v-spacer>
        <!--<v-btn icon>
            <v-icon>search</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>apps</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>refresh</v-icon>
        </v-btn>-->
        <v-btn icon>
            <ul class="nav ">
            <li class="nav-item"><a class="nav-link" href="javascript:" data-toggle="modal" data-target="#registerModal">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:" data-toggle="modal" data-target="#loginModal">Login</a></li>
            </ul>
        </v-btn>
    </v-toolbar>
</template>

<script>
    export default {
        name: "top-navbar",
        data(){
            return{
                header: 'images/header.jpg',
            }
        }
    }
</script>

<style scoped>
    @media(max-width:768px) {

        #sideImage {
            display: none;
        }

        /*.sidebar-collapse, .sidebar-collapse .nav {
            background: transparent !important;
            height: 200px ;
        }*/

        /*.navbar-header {
        background: #00BFFF;
    }
    .navbar-brand{
        display: none;
    }*/
    .navbar-side {
        z-index: 2;
        position: fixed;
        width: 260px;
        top: 69px;
        box-shadow: none;
        height: inherit !important;
    }
}
</style>