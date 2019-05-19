<template>
  <div class="Movies">
    <movies-search />
  </div>
</template>

<script>
// @ is an alias to /src
import MoviesSearch from "@/components/Movies/MoviesSearch.vue"

export default {
  name: 'movies',
  components: {
    MoviesSearch
  }
}
</script>

