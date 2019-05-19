<template>
  <div class="Movies">
    <movies-library />
  </div>
</template>

<script>
// @ is an alias to /src
import MoviesLibrary from "@/components/Movies/MoviesLibrary.vue"

export default {
  name: 'movies',
  components: {
    MoviesLibrary
  }
}
</script>

