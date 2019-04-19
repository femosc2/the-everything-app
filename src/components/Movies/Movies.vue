<template>
    <div>
        <div id="nav">
            <router-link to="/movies/MovieSearch">Search</router-link>
            <router-link to="/movies/Library">Library</router-link>
        </div>
    </div>
</template>

<script>
import MoviesSearch from "./MoviesSearch"
export default {
    data() {
        return {

        }
    },
    components: {
        MoviesSearch
    }
}
</script>

<style scoped>

</style>
