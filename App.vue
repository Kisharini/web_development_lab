<template>
  <div id="app">
    <!-- Render the current route's component -->
    <router-view :key="$route.fullPath" class="view" />
  </div>
</template>

<script setup>
// No logic needed here for now.
// All API calls and page logic are in the routed components (Dashboard, Quiz, etc.)
</script>

<style>
/* Global styles */
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

html,
body,
#app,
.view {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

#app > .view {
  overflow-x: hidden;
}
</style>
