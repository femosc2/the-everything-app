<template>
    <div>
      <md-progress-spinner class="spinner" md-mode="indeterminate" v-if="!weatherLoaded"></md-progress-spinner>
            <md-card v-if="weatherLoaded" class="card">
                <md-card-header>
                    <h2>{{ userCity }}</h2>
                    <h3> {{ userTemperature}} {{userWeather}}</h3>
                    <h3><img :src="'http://openweathermap.org/img/w/' + userIcon" alt=""></h3>
                </md-card-header>
            </md-card>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      lat: null,
      lng: null,
      userTemperature: "",
      userCity: "",
      userWeather: "",
      userIcon: "",
      weatherLoaded: false
    };
  },
  methods: {
    getLocation(callback) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(callback);
      } else {
        console.log("Geolocation is not supported by this browser.");
      }
    },
    getCurrentWeather() {
      axios
        .get(
          "http://api.openweathermap.org/data/2.5/weather?lat=" +
            this.lat +
            "&lon=" +
            this.lng +
            "&appid=65815e60870528d779d7eb889d42fa03"
        )
        .then(response => {
          let data = response.data;
          console.log(response);
          this.userCity = data.name;
          this.userWeather = data.weather[0].description;
          let kelvinTemperature = data.main.temp;
          this.userTemperature = Math.floor(kelvinTemperature - 273.15) + "C";
          this.userIcon = data.weather[0].icon + ".png";
          this.weatherLoaded = true;
        });
    },
    displayWeather() {
      this.getLocation(position => {
        this.lat = position.coords.latitude;
        this.lng = position.coords.longitude;
        this.getCurrentWeather();
      });
    }
  },
  created() {
    this.displayWeather();
  }
};
</script>

<style scoped>
ul {
  margin: 0 auto;
  padding: 0;
}

.card {
  width: 50%;
  margin: 0 auto;
  text-align: center;
}

.spinner {
  margin: 0 auto;
}

@media screen and (max-width: 1360px) {
  .card {
    width: 100%;
  }
}
</style>
