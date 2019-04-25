<template>
    <div>
        <ul>
            <md-card md-with-hover class="card" v-for="(movie,index) in userLibrary" :key=index>
                <md-card-header>
                    <h2>{{ movie.title }}</h2>
                    <h3> {{ movie.year}}</h3>
                </md-card-header>
                <md-card-media>
                    <img class="poster" :src=movie.poster alt="Poster">
                </md-card-media>
                <md-card-actions>
                    <md-button><a :href="'https://www.imdb.com/title/' + movie.link">Link to IMDB</a></md-button>
                    <md-button @click="removeFromLibrary(index)">Remove</md-button>
                </md-card-actions>
            </md-card>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userLibrary: []
        }
    },
    methods: {
        getMovieLibrary() {
            this.userLibrary = JSON.parse(localStorage.getItem("movieLibrary"));
        },
        removeFromLibrary(index) {
            let existing = JSON.parse(localStorage.getItem("movieLibrary"))
            existing = existing.splice(index + 1)
            localStorage.setItem("movieLibrary", JSON.stringify(existing))
            this.userLibrary.shift(index)
        }
    },
    created() {
        this.getMovieLibrary()
    }
}
</script>

<style scoped>

.poster {
    height: 200px;
    width: 200px;
}

.card {
    margin-top: 5%;
    margin-bottom: 5%;
}

ul {
    padding: 0;
}
</style>
