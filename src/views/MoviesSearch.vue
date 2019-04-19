<template>
  <div class="Movies">
    <movies-component />
    <movies-search />
  </div>
</template>

<script>
// @ is an alias to /src
import MoviesComponent from "@/components/Movies/Movies.vue"
import MoviesSearch from "@/components/Movies/MoviesSearch.vue"

export default {
  name: 'movies',
  components: {
    MoviesComponent,
    MoviesSearch
  }
}
</script>

