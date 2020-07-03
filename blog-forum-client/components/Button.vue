<template>
  <component
    :is="type"
    :to="to"
    :disabled="loading"
    class="transition-all duration-200 ease-in-out text-white font-bold py-1 px-4 rounded"
    :class="{
      'button-loading': loading,
      [`bg-${color}-500`]: color,
      [`hover:bg-${color}-700`]: color
    }"
  >
    <slot />
  </component>
</template>

<script>
export default {
  props: {
    loading: {
      type: Boolean,
      default: false
    },
    to: {
      default: null,
      type: [String, Object]
    },
    color: {
      default: 'blue',
      type: String
    }
  },
  computed: {
    type() {
      if (this.to) {
        return 'nuxt-link'
      }

      return 'button'
    }
  }
}
</script>

<style lang="scss" scoped>
@import '@/assets/scss/components/button';
</style>
