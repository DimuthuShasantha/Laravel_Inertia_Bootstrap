<template>
  <div>
    <NavBar />
    <slot />
  </div>
</template>

<script>
import NavBar from '@/Components/Main/NavBar.vue';

export default {
  components: {
    NavBar,
  }
}
</script>
