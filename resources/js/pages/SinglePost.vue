<template>
    <div class="container">
        <img v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">
        <div class="category">
            <span v-if="post.category"><b>Category:</b> </span>
            <span class="name-category" v-if="post.category">{{post.category.name}} </span>
        </div>
        <div class="tags" v-if="post.tags.length > 0">
              <span><b>Tags:</b> </span>
              <span class="name-tag" v-for="tag in post.tags" :key="tag.id">{{tag.name}} </span>
        </div>
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
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
.container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 100px 0;

    img{
        margin-bottom: 20px;
    }

    h1{
        margin: 20px 0;
    }

    .category, .tags{
        margin: 5px 0;

        .name-tag, .name-category{
            padding: 3px 5px;
            margin: 0 5px;
            border-radius: 5px;
            color: rgb(255, 255, 255);
        }

        .name-tag{
            background-color: rgb(0, 119, 255);
            
        }

        .name-category{
            background-color: rgb(0, 85, 170);
        }
    }
}
</style>