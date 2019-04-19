<template>
  <div class="Movies">
    <movies-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MoviesComponent from "@/components/Movies/Movies.vue"

export default {
  name: 'movies',
  components: {
    MoviesComponent
  }
}
</script>

