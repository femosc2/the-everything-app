<template>
  <div class="Movies">
    <media-upload-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MediaUploadComponent from "@/components/Media/MediaUpload.vue"

export default {
  name: 'mediaUpload',
  components: {
    MediaUploadComponent
  }
}
</script>

