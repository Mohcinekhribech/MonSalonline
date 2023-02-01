<template>
  <router-view/>
</template>
<script>
import Home from './views/Home.vue'
  export default {
  name: 'Home',
  components: {
    Home
  }
}
</script>

<style>
  @media (max-width: 768px) {
  #ul{
    top:-1000%;
    transition: all 0.6s;
  }
}

</style>
