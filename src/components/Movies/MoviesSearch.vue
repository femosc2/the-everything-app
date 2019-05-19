<template>
    <div class="searchContainer">
        <md-field class="movieSearch">
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
        <md-snackbar :md-position="position" :md-duration="isInfinity ? Infinity : duration" :md-active.sync="showSnackbar" md-persistent>
          <span>Movie saved!</span>
        </md-snackbar>
    </div>
</template>

<script>
import axios from "axios";
import { version } from 'punycode';
export default {
  data() {
    return {
      userMovies: [],
      userSearch: null,
      movieSearch: "",
      showSnackbar: false,
      position: 'center',
      duration: 4000,
      isInfinity: false
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
        });
    },
    favoriteMovie(index) {
      localStorage.favoriteMovie = this.userSearch[index].imdbID;
      this.showSnackbar = true;
    },
    addMovieToLibrary(index) {
      existing = JSON.parse(localStorage.getItem("movieLibrary"));
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
      this.showSnackbar = true;
    },
  }
};
</script>

<style scoped>
.poster {
  width: 200px;
}

.card {
  margin: 0 auto;
  margin-top: 5%;
  margin-bottom: 5%;
  width: 50%;
}

.searchContainer {
  height: 100vh;
}

ul {
  padding: 0;
}

.movieSearch {
  width: 50%;
  margin: 0 auto;
}

@media screen and (max-width: 1360px) {
  .card {
    width: 100%;
  }
  .movieSearch {
  width: 100%;
}
}
</style>
