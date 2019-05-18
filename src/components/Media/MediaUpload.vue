<template>
    <div>
        <h2>Upload</h2>
        <form action="server.php" enctype="multipart/form-data" method="post" id="myForm">
            <select name="type" id="typeMenu" v-on:change="chooseFileType">
            <option value="">File type:</option>
            <option value="photo">Photo</option>
            <option value="video">Video</option>
            <option value="audio">Audio</option>
            </select>
            <md-field>
            <label>Title</label>
                <md-input value="title" v-model="uploadTitle"></md-input>
            </md-field>
              <div v-if="chosenType === 'photo'">
                <label> Take a Photo</label>
                <input type="file" name="media" accept="image/*" capture="camera">
              </div>
              <div v-if="chosenType === 'audio'">
                <label> Record Audio</label>
                <input type="file" name="media" accept="audio/*" capture="microphone">
              </div>
            <div v-if="chosenType === 'video'">
              <label> Record Video</label>
              <input type="file" name="media" accept="video/*" capture="camcorder">
            </div>
            
            <md-button class="md-raised" @click="upload" v-if="uploadTitle.length > 3">Upload</md-button>
            <md-progress-bar md-mode="determinate" :md-value="uploadProgress"></md-progress-bar>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      file: "",
      uploadProgress: 0,
      uploadTitle: "",
      recordVideo: false,
      takePhoto: false,
      recordAudio: false,
      uploadFile: false,
      chosenType: null,

    };
  },
  methods: {
    upload() {
      if (this.uploadTitle.length > 3) {
        let formData = new FormData(document.getElementById("myForm"));
        const config = {
        onUploadProgress: progressEvent => this.uploadProgress = ((progressEvent.loaded/progressEvent.total) * 100)
          }

        axios.post("http://ddwap.mah.se/ah8301/server.php", formData, config).then((response) => {
          console.log(response);
        });
      }
    },
    chooseFileType() {
      this.chosenType = document.getElementById("typeMenu").value
    }
  }
}
</script>

<style>

#myForm {
  margin: 0 auto;
  width: 50%;
  text-align: center;
}

#typeMenu {
  margin: 0 auto;
  text-align: center;
}

h2 {
  text-align: center;
}
@media screen and (max-width: 1360px) {
  #myForm {
  width: 100%;
}
}
</style>

