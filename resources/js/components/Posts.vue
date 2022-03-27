<template>
    <div>
      <ul>
        <li v-for="(post, index) in posts" :key="index">
          <img v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">
          <h3>{{post.title}}</h3>
          <p>{{post.content}}</p>
          <div v-if="post.category">{{post.category.name}}</div>
          <div v-if="post.tags.length > 0">
              <h6>TAGS</h6>
            <ul>
              <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
            </ul>
          </div>

          <router-link :to="{name: 'single-post', params: {slug: post.slug}}">Leggi l'intero post</router-link>
        </li>
      </ul>
    </div>
</template>

<script>
export default {
    name: "Posts",
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
}
</script>

<style lang="scss" scoped>
ul{
  display: flex;
  flex-wrap: wrap;
  li{
    margin: 0 10px;
    width: calc((100% / 5) - 20px);
    list-style: none;
    img{
      width: 100%;
    }
  }
}
</style>