<template>
    <div class="searchContainer">
        <md-field>
            <label>Search for Movie here!</label>
            <md-input v-model="movieSearch"></md-input>
            <md-button class="md-raised" @click="searchMovie">Search</md-button>
        </md-field>
        <ul>
            <md-card md-with-hover class="card" v-for="(movie,index) in userSearch" :key=index>
                <md-card-header>
                    <h2>{{ movie.Title }}</h2>
                    <h3> {{ movie.Year}}</h3>
                </md-card-header>
                <md-card-media>
                    <img class="poster" :src=movie.Poster alt="Poster">
                </md-card-media>
                <md-card-actions>
                    <md-button class="md-raised md-primary" @click="favoriteMovie(index)">Favorite</md-button>
                    <md-button class="md-raised md-accent" @click="addMovieToLibrary(index)">Add to Library</md-button>
                </md-card-actions>
            </md-card>
        </ul>
        <md-button class="md-raised" @click="clearStorage">Clear LocalStorage</md-button>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      userMovies: [],
      userSearch: null,
      movieSearch: "",
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
          this.userSearch = data.Search;
          this.movieLink = "https://imbd.com/title/" + this.userSearch.imdbID;
        });
    },
    favoriteMovie(index) {
      localStorage.favoriteMovie = this.userSearch[index].imdbID;
    },
    addMovieToLibrary(index) {
      let existing = JSON.parse(localStorage.getItem("movieLibrary"));
      if (existing == null) {
        existing = [];
      }
      let movie = {
        year: this.userSearch[index].Year,
        title: this.userSearch[index].Title,
        poster: this.userSearch[index].Poster,
        link: this.userSearch[index].imdbID
      };
      existing.push(movie);
      existing = JSON.stringify(existing);
      localStorage.setItem("movieLibrary", existing);
    },
    clearStorage() {
      localStorage.clear();
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

.searchContainer {
  height: 100vh;
}
</style>
