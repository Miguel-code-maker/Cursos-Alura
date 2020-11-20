<template>
  <div class="body">
    <ready-header :routers="routes"></ready-header>
    <transition name="page">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
import { routes } from './router';
import Header from './Components/shared/menu.vue';
export default {
  components: {
    'ready-header': Header
  },

  data() {
    return {
      routes
    }
  }
}

</script>

<style>
  * {
    margin: 0;
    padding: 0;
  }

  .body {
    font-family: Helvetica, sans-serif;
  }

  .page-enter, .page-leave-active {
    opacity: 0;
  }

  .page-enter-active, .page-leave-actve {
    transition: opacity 0.4s;
  }
</style>
