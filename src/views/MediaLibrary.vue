<template>
  <div class="Movies">
    <media-component />
    <media-library-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MediaComponent from "@/components/Media/Media.vue"
import MediaLibraryComponent from "@/components/Media/MediaLibrary.vue"

export default {
  name: 'mediaLibrary',
  components: {
    MediaComponent,
    MediaLibraryComponent
  }
}
</script>

