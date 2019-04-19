<template>
    <div>
        <h1>Hey</h1>
        <md-field>
            <label>Search for Movie here!</label>
            <md-input v-model="movieSearch"></md-input>
            <md-button class="md-raised" @click="searchMovie">Search</md-button>
        </md-field>
        <p>{{ movieTitle }}</p>
        <p> {{ movieYear }}</p>
        <md-button class="md-raised" @click="favoriteMovie">Favorite</md-button>
        <md-button class="md-raised" @click="addMovieToLibrary">Add to Library</md-button>
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
      userMovies: []
    };
  },
  methods: {
    searchMovie() {
      axios
        .get(
          "http://www.omdbapi.com/?t=" + this.movieSearch + "&apikey=4478df9"
        )
        .then(response => {
          let data = response.data;
          this.movieYear = data.Released;
          this.movieTitle = data.Title;
          this.movieId = data.imdbID;
          this.moviePoster = data.Poster;
          this.movieLink = "https://imbd.com/title/" + data.imdbID
        });
    },
    favoriteMovie() {
        localStorage.favoriteMovie = this.movieId;
    },
    addMovieToLibrary() {
        let existing = JSON.parse(localStorage.getItem("movieLibrary"))
        if(existing == null) {
            existing = []
            console.log("existing was empty!")
        }
        let movie = {
        year: this.movieYear,
        title: this.movieTitle,
        poster: this.moviePoster,
        link: this.movieLink
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
</style>
