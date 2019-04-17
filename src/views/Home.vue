<template>
  <div class="home">
    <weather />
  </div>
</template>

<script>
// @ is an alias to /src
import Weather from "@/components/Weather/Weather.vue"

export default {
  name: 'home',
  components: {
    Weather
  }
}
</script>
