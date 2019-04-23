<template>
    <div>
        <h1>Hey</h1>
        <md-field>
            <label>Search for Movie here!</label>
            <md-input v-model="movieSearch"></md-input>
            <md-button class="md-raised" @click="searchMovie">Search</md-button>
        </md-field>
        <ul>
            <md-card class="card" v-for="(movie,index) in userSearch" :key=index>
                <md-card-header>
                    <h2>{{ movie.Title }}</h2>
                    <h3> {{ movie.Year}}</h3>
                </md-card-header>
                <md-card-media>
                    <img class="poster" :src=movie.Poster alt="Poster">
                </md-card-media>
                <md-card-actions>
                    <md-button class="md-raised" @click="favoriteMovie(index)">Favorite</md-button>
                    <md-button class="md-raised" @click="addMovieToLibrary(index)">Add to Library</md-button>
                </md-card-actions>
            </md-card>
        </ul>
        <p>{{ movieTitle }}</p>
        <p> {{ movieYear }}</p>
        <md-button class="md-raised" @click="clearStorage">Clear LocalStorage</md-button>
        
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      movieSearch: "",
      movieTitle: "",
      movieYear: "",
      movieId: "",
      moviePoster: "",
      movieLink: "",
      userMovies: [],
      userSearch: null,
    };
  },
  methods: {
    searchMovie() {
      axios
        .get(
          "http://www.omdbapi.com/?s=" + this.movieSearch + "&apikey=4478df9"
        )
        .then(response => {
          let data = response.data;
          this.userSearch = data.Search
          console.log(this.userSearch)
          this.movieLink = "https://imbd.com/title/" + this.userSearch.imdbID
        });
    },
    favoriteMovie(index) {
        localStorage.favoriteMovie = this.userSearch[index].imdbID
    },
    addMovieToLibrary(index) {
        let existing = JSON.parse(localStorage.getItem("movieLibrary"))
        if(existing == null) {
            existing = []
            console.log("existing was empty!")
        }
        let movie = {
        year: this.userSearch[index].Year,
        title: this.userSearch[index].Title,
        poster: this.userSearch[index].Poster,
        link: this.userSearch[index].imdbID
        }
        existing.push(movie);
        existing = JSON.stringify(existing);
        console.log(JSON.parse(existing))
        localStorage.setItem("movieLibrary", existing)

    },
    clearStorage() {
        localStorage.clear()
    }
  }
};
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
</style>
