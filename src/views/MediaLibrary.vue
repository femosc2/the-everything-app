<template>
  <div class="Movies">
    <media-library-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MediaLibraryComponent from "@/components/Media/MediaLibrary.vue"

export default {
  name: 'mediaLibrary',
  components: {
    MediaLibraryComponent
  }
}
</script>

