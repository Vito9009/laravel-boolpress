<template>
    <div>
        <img v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
        <div v-if="post.category">{{post.category.name}}</div>
        <div v-if="post.tags.length > 0">
            <ul>
                <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
            </ul>
        </div>
    </div>
</template>

<script>


export default {
    name: "SinglePost",
    data(){
      return{
        post: {}
      };
    },
  created(){
    axios.get(`/api/posts/${this.$route.params.slug}`).then((response) => {
      this.post = response.data;
    });
  }
};
</script>

<style lang="scss" scoped>

</style>