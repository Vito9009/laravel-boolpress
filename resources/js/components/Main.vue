<template>
  <div>
      <ul>
        <li v-for="(post, index) in posts" :key="index">
          <h3>{{post.title}}</h3>
          <p>{{post.content}}</p>
          <img v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">
        </li>
      </ul>
  </div>
</template>

<script>


export default {
    name: "Main",
    data(){
      return{
        posts: []
      };
    },
  created(){
    axios.get("/api/posts").then((response) => {
      this.posts = response.data;
    });
  }
};
</script>

<style lang="scss" scoped>

</style>