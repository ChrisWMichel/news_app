<template>
    <div>
        <div class="dashboard-cards">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image red">
                            <i class="material-icons dp48">import_export</i>
                        </div>
                        <div class="card-stacked red">
                            <div class="card-content">
                                <h3>84,198</h3>
                            </div>
                            <div class="card-action">
                                <strong>Ad Revenue</strong>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image orange">
                            <i class="material-icons dp48">person</i>
                        </div>
                        <div class="card-stacked orange">
                            <div class="card-content">
                                <h3>36,540</h3>
                            </div>
                            <div class="card-action">
                                <strong>Total Visits</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image blue">
                            <i class="material-icons dp48">person_pin</i>
                        </div>
                        <div class="card-stacked blue">
                            <div class="card-content">
                                <h3>24,225</h3>
                            </div>
                            <div class="card-action">
                                <strong>Members</strong>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image green">
                            <i class="material-icons dp48">comment</i>
                        </div>
                        <div class="card-stacked green">
                            <div class="card-content">
                                <h3>88,658</h3>
                            </div>
                            <div class="card-action">
                                <strong>Comments</strong>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted(){
            console.log('DashboardComponent has been mounted.')
        },

    }
</script>

<style scoped>

</style>