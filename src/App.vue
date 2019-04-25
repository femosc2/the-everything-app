<template>
  <div class="page-container md-layout-column">
    <md-toolbar class="md-primary">
      <md-button class="md-icon-button" @click="showNavigation = true">
        <md-icon>menu</md-icon>
      </md-button>
      <span class="md-title">The Everything App</span>
    </md-toolbar>

    <md-drawer class="drawer" :md-active.sync="showNavigation">
      <md-toolbar class="md-transparent" md-elevation="0">
        <span class="md-title">The Everything App</span>
      </md-toolbar>

      <md-list>
        <md-list-item>
          <md-icon>move_to_inbox</md-icon>
          <span class="md-list-item-text"><router-link to="/">Weather</router-link></span>
        </md-list-item>

        <md-list-item>
          <md-icon>send</md-icon>
          <span class="md-list-item-text"><router-link to="/movies/Search">Movie Searcher</router-link></span>
        </md-list-item>

        <md-list-item>
          <md-icon>send</md-icon>
          <span class="md-list-item-text"><router-link to="/movies/library">Movie Library</router-link></span>
        </md-list-item>

        <md-list-item>
          <md-icon>delete</md-icon>
          <span class="md-list-item-text"><router-link to="/media/upload">Media Uploader</router-link></span>
        </md-list-item>

        <md-list-item>
          <md-icon>delete</md-icon>
          <span class="md-list-item-text"><router-link to="/media/library">Media Library</router-link></span>
        </md-list-item>
      </md-list>
    </md-drawer>
    <md-content>
      <transition name="fade">
        <router-view/>
      </transition>
    </md-content>
  </div>
</template>

<script>
export default {
  name: "Temporary",
  data: () => ({
    showNavigation: false,
    showSidepanel: false
  })
};
</script>

<style lang="scss" scoped>
.page-container {
  position: relative;
  border: 1px solid rgba(#000, 0.12);
  height: 100vh;
}

// Demo purposes only
.md-drawer {
  width: 230px;
  max-width: calc(100vw - 125px);
}

.md-content {
  padding: 16px;
}
.md-title {
  font-size: 25px;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

.drawer {
  position: fixed;
}

.md-overlay {
    position: fixed !important;
    height: 100%;
  }
</style>
