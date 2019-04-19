<template>
    <div>
        <h1>Hey</h1>
        <md-field>
            <label>Search for Movie here!</label>
            <md-input v-model="userSearch"></md-input>
            <md-button class="md-raised" @click="searchMovie">Search</md-button>
        </md-field>
        <p>{{ userTitle }}</p>
        <p> {{ userYear }}</p>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            userSearch: "",
            userTitle: "",
            userYear: "" 
        }
    },
    methods: {
        searchMovie() {
            console.log(this.userSearch)
            axios
                .get("http://www.omdbapi.com/?t=" + this.userSearch + "&apikey=4478df9")
                .then(response => {
                let data = response.data;
                console.log(response);
                this.userYear = data.Released;
                this.userTitle = data.Title
                });

        }
    }
}
</script>

<style scoped>

</style>
