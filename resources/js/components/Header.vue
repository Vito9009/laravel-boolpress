<template>
  <header>
    <nav>
      <ul>
        <li><router-link :to="{name: 'home'}">HOME</router-link></li>
        <li><router-link :to="{name: 'about'}">CHI SIAMO</router-link></li>
      </ul>
    </nav>
  </header>
</template>

<script>

export default {
    name: "Header"
}
</script>

<style>

</style>