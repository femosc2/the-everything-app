<template>
  <div class="Movies">
    <media-component />
    <media-upload-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MediaComponent from "@/components/Media/Media.vue"
import MediaUploadComponent from "@/components/Media/MediaUpload.vue"

export default {
  name: 'mediaUpload',
  components: {
    MediaComponent,
    MediaUploadComponent
  }
}
</script>

