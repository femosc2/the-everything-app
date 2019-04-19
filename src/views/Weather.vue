<template>
  <div class="Weather">
    <weather-component />
  </div>
</template>

<script>
// @ is an alias to /src
import WeatherComponent from "@/components/Weather/Weather.vue"

export default {
  name: 'weather',
  components: {
    WeatherComponent
  }
}
</script>
