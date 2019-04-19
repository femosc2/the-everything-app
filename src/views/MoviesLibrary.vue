<template>
  <div class="Movies">
    <movies-component />
    <movies-library />
  </div>
</template>

<script>
// @ is an alias to /src
import MoviesComponent from "@/components/Movies/Movies.vue"
import MoviesLibrary from "@/components/Movies/MoviesLibrary.vue"

export default {
  name: 'movies',
  components: {
    MoviesComponent,
    MoviesLibrary
  }
}
</script>

