<template>
    <div>
        <h2>Library</h2>
        <section class="mediaLibrary">
            <section class="buttonSection">
                <md-button class="md-raised md-primary" @click="chooseSection('photos')">Photos</md-button>
                <md-button class="md-raised md-accent" @click="chooseSection('audio')">Audio</md-button>
                <md-button class="md-raised green" @click="chooseSection('videos')">Videos</md-button>
                <md-button class="md-raised" @click="chooseSection('all')">All</md-button>
            </section>
                <section class="imagesSection" v-if="chosenSection === 'photos' || chosenSection === 'all'">
                    <h2>Photos</h2>
                    <img v-for="(photo, index) in userPhotos" :key=index :src="'http://ddwap.mah.se/ah8301/' + photo.path" :alt="photo.title">
                </section>
                <section class="audioSection" v-if="chosenSection === 'audio' || chosenSection === 'all'">
                    <h2>Audio</h2>
                    <audio v-for="(audio, index) in userAudio" :key=index controls>
                        <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/mp3">
                        <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/ogg">
                        <source :src="'http://ddwap.mah.se/ah8301/' + audio.path" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </section>
                <section class="videoSection" v-if="chosenSection === 'videos' || chosenSection === 'all'">
                    <h2>Movies</h2>
                    <video v-for="(video, index) in userVideos" :key=index controls>
                        <source :src="'http://ddwap.mah.se/ah8301/' + video.path" type="video/mp4">
                        <source :src="'http://ddwap.mah.se/ah8301/' + video.path" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </section>
        </section>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      userPhotos: [],
      userVideos: [],
      userAudio: [],
      chosenSection: null
    };
  },
  methods: {
    getMediaLibrary() {
      axios
        .get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=photo")
        .then(response => {
          this.userPhotos = response.data.files;
        });
      axios
        .get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=audio")
        .then(response => {
          this.userAudio = response.data.files;
        });
      axios
        .get("http://ddwap.mah.se/ah8301/server.php?action=getMedia&type=video")
        .then(response => {
          this.userVideos = response.data.files;
        });
    },
    chooseSection(section) {
      this.chosenSection = section;
    }
  },
  created() {
    this.getMediaLibrary();
  }
};
</script>

<style scoped>
video {
  width: 33%;
  height: 66vh;
  background: black;
}

img {
  width: 33%;
  background: black;
}

audio {
    width: 33%;
}

.green {
    background: #27ff7d !important;
}

.buttonSection {
    margin: 0 auto;
    width: 50%;
    text-align: center;
}

h2 {
  text-align: center;
}

.imagesSection, .moviesSection, .audioSection {
    margin-bottom: 10px;
    margin-top: 10px;
}

@media screen and (max-width: 1360px) {
  img {
    width: 100%;
  }
  video {
  width: 100%;
  }
  audio {
      width: 100%;
  }
}
</style>
