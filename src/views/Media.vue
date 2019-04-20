<template>
  <div class="Media">
    <media-component />
  </div>
</template>

<script>
// @ is an alias to /src
import MediaComponent from "@/components/Media/Media.vue"

export default {
  name: 'media',
  components: {
    MediaComponent
  }
}
</script>

