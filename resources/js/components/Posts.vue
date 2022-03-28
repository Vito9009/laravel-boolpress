<template>
    <div>
      <div class="container">
        <div class="card-post" v-for="(post, index) in posts" :key="index">
            <img v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">
                <img v-else src="https://www.ats-anpress.it/wp-content/uploads/2020/11/creare-un-sito-web-con-wordpress-1.png" alt="">
          <div class="info-card-post">
                <h3>{{post.title}}</h3>
                <p>{{post.content}}</p>
                <div>
                    <span v-if="post.category"><b>Category:</b> </span>
                    <span v-if="post.category">{{post.category.name}} </span>
                </div>
                
                <div v-if="post.tags.length > 0">
                    <span><b>Tags:</b> </span>
                    <span v-for="tag in post.tags" :key="tag.id">{{tag.name}} </span>
                </div>

                <router-link class="router-link" :to="{name: 'single-post', params: {slug: post.slug}}">Leggi l'intero post</router-link>
          </div>
          
        </div>
      </div>
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
.container{
  display: flex;
  flex-wrap: wrap;
  margin:50px 0;
  .card-post{
    margin: 30px 20px;
    width: calc((100% / 4) - 40px);
    height: 500px;
    background-color: rgb(255, 255, 255);
        img{
            width: 100%;
            height: 40%;
            object-fit: cover;
        }
        .info-card-post{
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                height: 60%;
                width: 80%;
                margin: 0 auto;
                p{
                    width: 100%;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .router-link{
                    text-decoration: none;
                    color: rgb(0, 85, 170);
                    font-weight: bold;
                    padding: 10px;
                    border-radius: 10px;
                    border: 0px;
                    background-color: rgb(235, 235, 235);
                    text-align: center;
                }

            
    }
  }
}
</style>