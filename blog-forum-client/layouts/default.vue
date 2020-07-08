<template>
  <div class="default-layout">
    <navigation />
    <Nuxt />
  </div>
</template>

<script>
// Component
import Navigation from '@/components/Navigation';

export default {
  components: {
    Navigation
  }
}
</script>