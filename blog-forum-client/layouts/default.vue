<template>
  <div>
    <nav>
      <ul>
        <li>
          <nuxt-link :to="{name: 'login'}">Login</nuxt-link>
          <nuxt-link :to="{name: 'register'}">Register</nuxt-link>
        </li>
      </ul>
    </nav>
    <Nuxt />
  </div>
</template>