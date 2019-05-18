<template>
    <div>
        <h2>Library</h2>
        <md-button class="md-primary" @click="chooseSection('photos')">Photos</md-button>
        <md-button class="md-accent" @click="chooseSection('audio')">Audio</md-button>
        <md-button @click="chooseSection('videos')">Videos</md-button>
        <section class="imagesSection" v-if="chosenSection === 'photos'">
            <img v-for="(photo, index) in userPhotos" :key=index :src="'http://ddwap.mah.se/ah8301/' + photo.path" :alt="photo.title">
        </section>
        <section class="audioSection" v-if="chosenSection === 'audio'">
            <audio v-for="(audio, index) in userAudio" :key=index controls>
                <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/mp3">
                <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/ogg">
                <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </section>
        <section class="videoSection" v-if="chosenSection === 'videos'">
            <video v-for="(video, index) in userVideos" :key=index controls>
                <source :src="'http://ddwap.mah.se/ah8301/' + video.path" type="video/mp4">
                <source :src="'http://ddwap.mah.se/ah8301/' + video.path" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </section>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            userPhotos: [],
            userVideos: [],
            userAudio: [],
            chosenSection: null,
        }
    },
    methods: {
        getMediaLibrary() {
            axios.get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=photo").then((response) => {
                this.userPhotos = response.data.files
            })
            axios.get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=audio").then((response) => {
                this.userAudio = response.data.files
            })
            axios.get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=video").then((response) => {
                this.userVideos = response.data.files
            })
        },
        chooseSection(section) {
            this.chosenSection = section;
        }
    },
    created() {
        this.getMediaLibrary()
    }
}
</script>

<style>
video {
    height: 240px;
    width: 320px;
}

img {
    height: 240px;
    width: 33%;
}

</style>
