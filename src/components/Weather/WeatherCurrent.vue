<template>
    <div>
        <ul>
            <li> {{ userTemperature }}</li>
            <li> {{ userCity }}</li>
            <li> {{ userWeather }}</li>
        </ul>
    </div>
</template>

<script>
import axios from "axios"
import { setTimeout } from 'timers';
export default {
    data() {
        return {
            lat: null,
            lng: null,
            userTemperature: "",
            userCity: "",
            userWeather: "",
        }
    },
    methods: {
        getLocation(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(callback)
        } else {
            console.log("Geolocation is not supported by this browser.")
        }
        },
        getCurrentWeather() {
            axios.get('http://api.openweathermap.org/data/2.5/weather?lat=' + this.lat + '&lon=' + this.lng + '&appid=65815e60870528d779d7eb889d42fa03').then((response) => {
                let data = response.data
                console.log(response.data)
                this.userCity = data.name
                this.userWeather = data.weather[0].description
                let kelvinTemperature = data.main.temp
                this.userTemperature = Math.floor(kelvinTemperature - 273.15) + "C"
                })
            },
        displayWeather() {
            let promise = new Promise((resolve, reject) => {
                if (this.lng === null && this.lat === null) {
                    resolve(this.getLocation((position) => {
                        this.lat = position.coords.latitude
                        this.lng = position.coords.longitude
                        this.getCurrentWeather()
                        return this.lat, this.lng
                    }), console.log("resolved"))
                } else if (this.lng != null && this.lat != null) {
                    reject(console.log("Rejected"))
                }
            })
        }
    },
    created() {
        this.displayWeather()
    }
}
</script>

<style lang="sass" scoped>

</style>
