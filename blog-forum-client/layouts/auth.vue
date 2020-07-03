<template>
  <div class="auth-layout">
    <nav>
      <ul>
        <li>
          <nuxt-link :to="{name: 'index'}">Home</nuxt-link>
          <nuxt-link :to="{name: 'login'}">Login</nuxt-link>
          <nuxt-link :to="{name: 'register'}">Register</nuxt-link>
        </li>
      </ul>
    </nav>
    <Nuxt />
  </div>
</template>

<script>
export default {
  middleware: 'guest'
}
</script>