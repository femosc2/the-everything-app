<template>
    <div>
        <h2>Upload</h2>
        <form action="server.php" enctype="multipart/form-data" method="post" id="myForm">
            <select name="type">
            <option value="">Välj typ här</option>
            <option value="photo">Foto</option>
            <option value="video">Video</option>
            <option value="audio">Ljud</option>
            </select>
            <input type="file" name="media" class="btn" id="file" ref="file" v-on:change="handleFileUpload()">
            <md-button class="md-raised" @click="upload">Upload</md-button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      file: ""
    };
  },
  methods: {
    upload() {
      let formData = new FormData(document.getElementById("myForm"));
      formData.append("file", this.file);

      axios.post("http://ddwap.mah.se/ah8301/server.php", formData).then((response) => {
        console.log(response);
      });
    },
    handleFileUpload() {
        this.file = this.$refs.file.files[0];
    }
  }
}
</script>

<style>
</style>

