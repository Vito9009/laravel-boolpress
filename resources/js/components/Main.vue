<template>
  <main>
    <router-view></router-view>
  </main>
</template>

<script>


export default {
    name: "Main"
};
</script>

<style lang="scss" scoped>
main{
  height: calc(100vh - 200px);
  width: 80%;
  margin: 0 auto;
  overflow: scroll;
  -ms-overflow-style: none;
  scrollbar-width: none;

    &::-webkit-scrollbar{
      display: none;
    }
}
</style>